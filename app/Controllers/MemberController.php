<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Models\Member;
use App\Services\AuthService;

class MemberController extends Controller
{
    private function guard(): void
    {
        if (!AuthService::check()) {
            Response::redirect('/QAccess/public/login');
        }
    }

    public function index(): void
    {
        $this->guard();

        $search = trim($_GET['search'] ?? '');

        $this->view('members/index', [
            'username' => Session::get('username'),
            'members'  => Member::all($search),
            'search'   => $search
        ]);
    }

    public function archived(): void
    {
        $this->guard();

        $search = trim($_GET['search'] ?? '');

        $this->view('members/archived', [
            'username' => Session::get('username'),
            'members'  => Member::all($search, true),
            'search'   => $search
        ]);
    }

    public function create(): void
    {
        $this->guard();

        $this->view('members/create', [
            'username' => Session::get('username')
        ]);
    }

    public function store(): void
    {
        $this->guard();

        $request = new Request();

        $pdo = Database::connection();

        $stmt = $pdo->prepare("
            INSERT INTO members
            (
                member_uuid,
                first_name,
                middle_name,
                last_name,
                sex_id,
                primary_email,
                primary_mobile,
                birth_date
            )
            VALUES
            (
                UUID(),
                ?,?,?,?,?,?,?
            )
        ");

        $stmt->execute([
            trim($request->input('first_name')),
            trim($request->input('middle_name')),
            trim($request->input('last_name')),
            $request->input('sex_id'),
            trim($request->input('primary_email')),
            trim($request->input('primary_mobile')),
            $request->input('birth_date')
        ]);

        Response::redirect('/QAccess/public/members');
    }

    public function show(): void
    {
        $this->guard();

        $id = (int)($_GET['id'] ?? 0);

        $this->view('members/show', [
            'username' => Session::get('username'),
            'member'   => Member::find($id)
        ]);
    }

    public function edit(): void
    {
        $this->guard();

        $id = (int)($_GET['id'] ?? 0);

        $this->view('members/edit', [
            'username' => Session::get('username'),
            'member'   => Member::find($id)
        ]);
    }

    public function update(): void
    {
        $this->guard();

        $request = new Request();

        $id = (int) $request->input('member_id');

        Member::update($id, [
            'first_name'    => trim($request->input('first_name')),
            'middle_name'   => trim($request->input('middle_name')),
            'last_name'     => trim($request->input('last_name')),
            'sex_id'        => $request->input('sex_id'),
            'primary_email' => trim($request->input('primary_email')),
            'primary_mobile'=> trim($request->input('primary_mobile')),
            'birth_date'    => $request->input('birth_date')
        ]);

        Response::redirect('/QAccess/public/members');
    }

    public function archive(): void
    {
        $this->guard();

        $id = (int)($_GET['id'] ?? 0);

        Member::archive($id);

        Response::redirect('/QAccess/public/members');
    }

    public function restore(): void
    {
        $this->guard();

        $id = (int)($_GET['id'] ?? 0);

        Member::restore($id);

        Response::redirect('/QAccess/public/members/archived');
    }
}