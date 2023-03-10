<?php

namespace App\Controllers\Data;

use App\Controllers\BaseController;
use CodeIgniter\Database\MySQLi\Connection;
use CodeIgniter\Exceptions\PageNotFoundException;

class Student extends BaseController
{
    private Connection $db;
    private int $perPage = 12;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function index()
    {
        $perPage = intval($this->request->getVar('perPage') ?? $this->perPage);
        $page = intval($this->request->getVar('page') ?? 0);
        $keyword = $this->request->getVar('keyword') ?? '';
        $order = $this->request->getVar('order');

        $students = $this->db->table('students')
            ->select('students.id, students.regist_id, regist_number, fullname, nim, admission, phone')
            ->join('registers', 'students.regist_id = registers.regist_id')
            ->like('fullname', $keyword);

        if ($order) $students->orderBy($order, 'ASC');

        $total = $students->countAllResults(false);
        $students = $students->get($perPage, $page * $perPage);

        return $this->response->setStatusCode(200)->setJSON([
            'students' => $students->getResult(),
            'total' => $total,
            'next' => floor($total / $perPage - $page) > 0,
            'keyword' => $keyword,
        ]);
    }

    public function show($id)
    {
        $student = $this->db->table('students')
            ->join('registers', 'students.regist_id = registers.regist_id')
            ->where('students.id', $id)
            ->get()
            ->getFirstRow();

        if (!$student) throw new PageNotFoundException('Student Not Found');

        return $this->response->setStatusCode(200)->setJSON([
            'message' => 'Success get student data',
            'student' => $student,
        ]);
    }
}
