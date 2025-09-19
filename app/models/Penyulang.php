<?php

namespace App\Models;

use App\Core\Model;
use PDO;

class Penyulang extends Model
{
    protected $table = "penyulang";
    protected $primaryKey = "penyulang_id";

    /**
     * Get paginated data with search functionality and JOIN with gardu_induk
     */
    public function paginateWithJoin($page = 1, $perPage = 10, $search = '')
    {
        $offset = ($page - 1) * $perPage;
        
        // Build search condition
        $searchCondition = '';
        $params = [];
        
        if (!empty($search)) {
            $searchCondition = " WHERE (t.kode_penyulang LIKE :search1 OR t.nama_penyulang LIKE :search2 OR CAST(t.tegangan_kv AS TEXT) LIKE :search3 OR j.nama_gi LIKE :search4 OR j.area LIKE :search5)";
            $searchTerm = "%{$search}%";
            $params = [
                'search1' => $searchTerm,
                'search2' => $searchTerm,
                'search3' => $searchTerm,
                'search4' => $searchTerm,
                'search5' => $searchTerm
            ];
        }

        // Get total count for pagination
        $countSql = "SELECT COUNT(*) as total 
                    FROM {$this->table} t 
                    JOIN gardu_induk j ON t.gi_id = j.gi_id 
                    {$searchCondition}";
        $countStmt = $this->db->prepare($countSql);
        $countStmt->execute($params);
        $totalRecords = $countStmt->fetch(PDO::FETCH_ASSOC)['total'];
        $totalPages = ceil($totalRecords / $perPage);

        // Get paginated data
        $dataSql = "SELECT t.*, j.nama_gi, j.area 
                   FROM {$this->table} t 
                   JOIN gardu_induk j ON t.gi_id = j.gi_id 
                   {$searchCondition} 
                   ORDER BY t.created_at DESC 
                   LIMIT :limit OFFSET :offset";
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
     * Search penyulang by multiple fields with JOIN
     */
    public function searchWithJoin($searchTerm, $page = 1, $perPage = 10)
    {
        return $this->paginateWithJoin($page, $perPage, $searchTerm);
    }
}
