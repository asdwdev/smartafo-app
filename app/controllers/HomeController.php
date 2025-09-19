<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\Database;

class HomeController
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    /**
     * Halaman awal -> redirect ke login / dashboard
     */
    public function index()
    {
        if (empty($_SESSION['user'])) {
            header("Location: /login");
        } else {
            header("Location: /dashboard");
        }
        exit;
    }

    /**
     * Dashboard view
     */
    public function dashboard()
    {
        return view('dashboard/index');
    }

    /**
     * 1. Jumlah Penyulang per Gardu Induk
     */
    public function penyulangPerGI()
    {
        $stmt = $this->db->query("
        SELECT gi.nama_gi, COUNT(p.penyulang_id) AS total_penyulang
        FROM penyulang p
        INNER JOIN gardu_induk gi ON gi.gi_id = p.gi_id
        GROUP BY gi.gi_id, gi.nama_gi
        ORDER BY gi.nama_gi ASC
    ");

        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return view('home/penyulang_per_gi', compact('data'));
    }

    /**
     * 2. Jumlah Gardu Distribusi per Penyulang
     */
    public function garduPerPenyulang()
    {
        $stmt = $this->db->query("
        SELECT p.nama_penyulang, gi.nama_gi, COUNT(gd.gd_id) AS total_gardu
        FROM gardu_distribusi gd
        INNER JOIN penyulang p ON p.penyulang_id = gd.penyulang_id
        INNER JOIN gardu_induk gi ON gi.gi_id = p.gi_id
        GROUP BY p.penyulang_id, p.nama_penyulang, gi.nama_gi
        ORDER BY gi.nama_gi ASC, p.nama_penyulang ASC
    ");

        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return view('home/gardu_per_penyulang', compact('data'));
    }

    /**
     * 3. Jumlah Gardu Distribusi per Area (dari GI)
     */
    public function garduPerArea()
    {
        $sql = "
        SELECT gi.area AS nama_area, COUNT(gd.gd_id) AS total_gardu
        FROM gardu_distribusi gd
        INNER JOIN gardu_induk gi ON gi.gi_id = gd.gi_id
        GROUP BY gi.area
        ORDER BY gi.area ASC
    ";
        $stmt = $this->db->query($sql);
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return view('home/gardu_per_area', compact('data'));
    }


    /**
     * 4. Jumlah Penyulang per Area
     */
    public function penyulangPerArea()
    {
        $sql = "
        SELECT gi.area AS nama_area, COUNT(p.penyulang_id) AS total_penyulang
        FROM penyulang p
        INNER JOIN gardu_induk gi ON gi.gi_id = p.gi_id
        GROUP BY gi.area
        ORDER BY gi.area ASC
    ";
        $stmt = $this->db->query($sql);
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return view('home/penyulang_per_area', compact('data'));
    }


    /**
     * 5. Jumlah Trafo Terpasang per Area
     */
    public function trafoPerArea()
    {
        $sql = "
        SELECT gi.area AS nama_area, COUNT(tg.trafo_gardu_id) AS total_trafo
        FROM trafo_gardu tg
        INNER JOIN gardu_distribusi gd ON gd.gd_id = tg.gd_id
        INNER JOIN gardu_induk gi ON gi.gi_id = gd.gi_id
        GROUP BY gi.area
        ORDER BY gi.area ASC
    ";
        $stmt = $this->db->query($sql);
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return view('home/trafo_per_area', compact('data'));
    }


    /**
     * 6. Jumlah Jurusan per Area
     */
    public function jurusanPerArea()
    {
        $sql = "
        SELECT gi.area AS nama_area, COUNT(j.jurusan_id) AS total_jurusan
        FROM jurusan j
        INNER JOIN gardu_distribusi gd ON gd.gd_id = j.gd_id
        INNER JOIN gardu_induk gi ON gi.gi_id = gd.gi_id
        GROUP BY gi.area
        ORDER BY gi.area ASC
    ";
        $stmt = $this->db->query($sql);
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return view('home/jurusan_per_area', compact('data'));
    }


    /**
     * 7. Jumlah Kubikel Gardu Distribusi per Area
     */
    public function kubikelGarduPerArea()
    {
        $sql = "
        SELECT gi.area AS nama_area, COUNT(kg.kubikel_gardu_id) AS total_kubikel
        FROM kubikel_gardu kg
        INNER JOIN gardu_distribusi gd ON gd.gd_id = kg.gd_id
        INNER JOIN gardu_induk gi ON gi.gi_id = gd.gi_id
        GROUP BY gi.area
        ORDER BY gi.area ASC
    ";
        $stmt = $this->db->query($sql);
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return view('home/kubikel_gardu_per_area', compact('data'));
    }
}
