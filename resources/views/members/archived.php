<div class="page">

    <div class="topbar">

        <div class="topbar-title">
            Archived Members
        </div>

        <div class="topbar-right">

            <div class="topbar-icon">
                <i class="bi bi-bell"></i>
            </div>

            <div class="user-box">

                <div class="user-avatar">
                    <?= strtoupper(substr($username, 0, 1)) ?>
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
            <h1>Archived Members</h1>
            <p>Restore archived records when needed.</p>
        </div>

        <div class="d-flex gap-2">
            <a href="/QAccess/public/members" class="btn btn-outline-qaccess">
                Back to Members
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
                        placeholder="Search archived member..."
                        value="<?= htmlspecialchars($search) ?>">
                </div>

                <div class="col-md-2">
                    <button class="btn btn-qaccess w-100">
                        Search
                    </button>
                </div>

            </div>

        </form>

        <div class="table-card">

            <table class="table align-middle">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Archived At</th>
                        <th width="120">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($members as $member): ?>

                        <tr>
                            <td><?= $member['member_id'] ?></td>

                            <td>
                                <?= htmlspecialchars(
                                    trim(
                                        $member['first_name'] . ' ' .
                                        $member['middle_name'] . ' ' .
                                        $member['last_name']
                                    )
                                ) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($member['primary_email']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($member['deleted_at']) ?>
                            </td>

                            <td>
                                <a
                                    href="/QAccess/public/members/restore?id=<?= $member['member_id'] ?>"
                                    class="btn btn-sm btn-qaccess"
                                    onclick="return confirm('Restore this member?')">
                                    <i class="bi bi-arrow-counterclockwise"></i>
                                </a>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>