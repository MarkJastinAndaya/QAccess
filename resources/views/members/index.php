<div class="page">

    <div class="topbar">

        <div class="topbar-title">

            Members

        </div>

        <div class="topbar-right">

            <div class="topbar-icon">

                <i class="bi bi-bell"></i>

            </div>

            <div class="user-box">

                <div class="user-avatar">

                    <?= strtoupper(substr($username,0,1)) ?>

                </div>

                <div>

                    <div class="user-name">

                        <?= htmlspecialchars($username) ?>

                    </div>

                    <small class="text-secondary-qaccess">

                        Administrator

                    </small>

                </div>

            </div>

        </div>

    </div>

    <div class="page-header">

        <div>

            <h1>Members</h1>

            <p>

                Manage all registered members of the Quirinians' Student Organization.

            </p>

        </div>

        <div>

            <a
            href="/QAccess/public/members/create"
            class="btn btn-qaccess">

            <i class="bi bi-person-plus"></i>

            Add Member

            </a>

        </div>

    </div>

    <div class="content-card">

        <form method="GET">

        <div class="row mb-4">

            <div class="col-md-4">

                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Search member..."
                    value="<?= htmlspecialchars($search) ?>">

            </div>

            <div class="col-md-3">

                <select class="form-select">

                    <option>All Status</option>

                    <option>Active</option>

                    <option>Inactive</option>

                </select>

            </div>

            <div class="col-md-2">

                <button
                    class="btn btn-qaccess w-100">

                    Search

                </button>

            </div>

            </div>

            </form>

        </div>

        <div class="table-card">

            <table class="table align-middle">

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Name</th>

                        <th>Email</th>

                        <th>Status</th>

                        <th width="180">

                            Actions

                        </th>

                    </tr>

                </thead>

                <tbody>

                <?php foreach($members as $member): ?>

                <tr>

                <td>

                <?= $member['member_id'] ?>

                </td>

                <td>

                <?= htmlspecialchars(
                        trim(
                            $member['first_name'].' '.
                            $member['middle_name'].' '.
                            $member['last_name']
                        )
                ) ?>

                </td>

                <td>

                <?= htmlspecialchars($member['primary_email']) ?>

                </td>

                <td>

                <span class="badge-success">

                Active

                </span>

                </td>

                <td>

                <a
                href="/QAccess/public/members/show?id=<?= $member['member_id'] ?>"
                class="btn btn-sm btn-outline-qaccess">

                <i class="bi bi-eye"></i>

                </a>

                <a
                href="/QAccess/public/members/edit?id=<?= $member['member_id'] ?>"
                class="btn btn-sm btn-outline-qaccess">

                <i class="bi bi-pencil"></i>

                </a>

                <a
                href="/QAccess/public/members/archive?id=<?= $member['member_id'] ?>"
                class="btn btn-sm btn-outline-danger"
                onclick="return confirm('Archive this member?')">

                <i class="bi bi-archive"></i>

                </a>

                </td>

                </tr>

                <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>