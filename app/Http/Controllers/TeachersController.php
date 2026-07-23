<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index()
    {
        return "ini adalah halaman daftar guru";

    }

    public function show(string $id)
    {
        return "ini adalah halaman detail guru dengan ID: {$id}";
    }

    public function create()
    {
        return "ini adalah halaman tambah guru";
    }

    public function edit(string $id)
    {
        return "ini adalah halaman edit guru dengan ID: {$id}";
    }

    public function store()
    {
        return "menambah data guru baru";
    }

    public function update (string $id)
    {
        return "mengubah data guru dengan ID: {$id}";
    }

    public function destroy(string $id)
    {
        return "menghapus data guru dengan ID: {$id}";
    }
}
