<?php

namespace App\Core;

use PDO;

class Validator
{
    protected array $data;
    protected array $rules;
    protected array $errors = [];
    protected ?PDO $pdo;

    /**
     * @param array $data  Data input (biasanya dari Request)
     * @param array $rules Aturan validasi
     * @param PDO|null $pdo Opsional: koneksi DB untuk rule unique
     */
    public function __construct(array $data, array $rules, ?PDO $pdo = null)
    {
        $this->data = $data;
        $this->rules = $rules;
        $this->pdo = $pdo;
    }

    /**
     * Jalankan validasi
     */
    public function fails(): bool
    {
        foreach ($this->rules as $field => $ruleString) {
            $rules = explode('|', $ruleString);
            $value = trim((string)($this->data[$field] ?? ''));

            foreach ($rules as $rule) {
                $param = null;

                if (strpos($rule, ':') !== false) {
                    [$rule, $param] = explode(':', $rule, 2);
                }

                switch ($rule) {
                    case 'required':
                        if ($value === '') {
                            $this->addError($field, "$field wajib diisi.");
                        }
                        break;

                    case 'min':
                        if ($value !== '' && strlen($value) < (int)$param) {
                            $this->addError($field, "$field minimal $param karakter.");
                        }
                        break;

                    case 'max':
                        if ($value !== '' && strlen($value) > (int)$param) {
                            $this->addError($field, "$field maksimal $param karakter.");
                        }
                        break;

                    case 'numeric':
                        if ($value !== '' && !is_numeric($value)) {
                            $this->addError($field, "$field harus berupa angka.");
                        }
                        break;

                    case 'email':
                        if ($value !== '' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                            $this->addError($field, "$field tidak valid.");
                        }
                        break;

                    case 'regex':
                        if ($value !== '' && $param) {
                            if (!preg_match($param, $value)) {
                                $this->addError($field, "$field tidak sesuai format.");
                            }
                        }
                        break;

                    case 'unique':
                        if ($value !== '' && $this->pdo) {
                            // Format: unique:table,column[,except,idColumn]
                            $parts = explode(',', $param);
                            $table  = $parts[0] ?? null;
                            $column = $parts[1] ?? null;
                            $except = $parts[2] ?? null;
                            $idCol  = $parts[3] ?? 'id';

                            if ($table && $column) {
                                $sql = "SELECT COUNT(*) FROM {$table} WHERE {$column} = ?";
                                $params = [$value];

                                if ($except) {
                                    $sql .= " AND {$idCol} != ?";
                                    $params[] = $except;
                                }

                                $stmt = $this->pdo->prepare($sql);
                                $stmt->execute($params);
                                $exists = $stmt->fetchColumn();

                                if ($exists) {
                                    $this->addError($field, "$field sudah digunakan.");
                                }
                            }
                        }
                        break;

                        // TODO: tambahin rule lain kalau perlu (between, date, dsb)
                }
            }
        }

        return !empty($this->errors);
    }

    /**
     * Ambil semua error
     */
    public function errors(): array
    {
        return $this->errors;
    }

    /**
     * Tambahin error ke field tertentu
     */
    protected function addError(string $field, string $message): void
    {
        $this->errors[$field][] = $message;
    }
}
