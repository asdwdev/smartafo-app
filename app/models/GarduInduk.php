<?php

namespace App\Models;

use App\Core\Model;
use PDO;

class GarduInduk extends Model
{
    protected $table = "gardu_induk";
    protected $primaryKey = "gi_id";

    /**
     * Get paginated data with search functionality
     */
    public function paginate($page = 1, $perPage = 10, $search = '')
    {
        $offset = ($page - 1) * $perPage;
        
        // Build search condition
        $searchCondition = '';
        $params = [];
        
        if (!empty($search)) {
            $searchCondition = " WHERE (kode_gi LIKE :search1 OR nama_gi LIKE :search2 OR area LIKE :search3 OR alamat LIKE :search4)";
            $searchTerm = "%{$search}%";
            $params = [
                'search1' => $searchTerm,
                'search2' => $searchTerm,
                'search3' => $searchTerm,
                'search4' => $searchTerm
            ];
        }

        // Get total count for pagination
        $countSql = "SELECT COUNT(*) as total FROM {$this->table}{$searchCondition}";
        $countStmt = $this->db->prepare($countSql);
        $countStmt->execute($params);
        $totalRecords = $countStmt->fetch(PDO::FETCH_ASSOC)['total'];
        $totalPages = ceil($totalRecords / $perPage);

        // Get paginated data
        $dataSql = "SELECT * FROM {$this->table}{$searchCondition} ORDER BY updated_at DESC LIMIT :limit OFFSET :offset";
        $dataStmt = $this->db->prepare($dataSql);
        
        foreach ($params as $key => $value) {
            $dataStmt->bindValue(":{$key}", $value);
        }
        $dataStmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
        $dataStmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $dataStmt->execute();
        
        $data = $dataStmt->fetchAll(PDO::FETCH_ASSOC);

        return [
            'data' => $data,
            'pagination' => [
                'current_page' => $page,
                'per_page' => $perPage,
                'total_records' => $totalRecords,
                'total_pages' => $totalPages,
                'has_next' => $page < $totalPages,
                'has_prev' => $page > 1,
                'next_page' => $page < $totalPages ? $page + 1 : null,
                'prev_page' => $page > 1 ? $page - 1 : null
            ]
        ];
    }

    /**
     * Search gardu induk by multiple fields
     */
    public function search($searchTerm, $page = 1, $perPage = 10)
    {
        return $this->paginate($page, $perPage, $searchTerm);
    }
}
