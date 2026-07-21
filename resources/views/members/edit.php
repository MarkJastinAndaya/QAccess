<div class="page">

    <div class="topbar">

        <div class="topbar-title">

            Edit Member

        </div>

        <div class="topbar-right">

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

            <h1>

                Edit Member

            </h1>

            <p>

                Update member information.

            </p>

        </div>

    </div>

    <form
        action="/QAccess/public/members/edit"
        method="POST">

        <input
            type="hidden"
            name="member_id"
            value="<?= $member['member_id'] ?>">

        <div class="content-card">

            <h4 class="mb-4">

                Personal Information

            </h4>

            <div class="row g-3">

                <div class="col-md-4">

                    <label class="form-label">

                        First Name

                    </label>

                    <input
                        class="form-control"
                        name="first_name"
                        value="<?= htmlspecialchars($member['first_name']) ?>">

                </div>

                <div class="col-md-4">

                    <label class="form-label">

                        Middle Name

                    </label>

                    <input
                        class="form-control"
                        name="middle_name"
                        value="<?= htmlspecialchars($member['middle_name']) ?>">

                </div>

                <div class="col-md-4">

                    <label class="form-label">

                        Last Name

                    </label>

                    <input
                        class="form-control"
                        name="last_name"
                        value="<?= htmlspecialchars($member['last_name']) ?>">

                </div>

                <div class="col-md-4">

                    <label class="form-label">

                        Sex

                    </label>

                    <select
                        class="form-select"
                        name="sex_id">

                        <option value="1" <?= $member['sex_id']==1?'selected':'' ?>>

                            Male

                        </option>

                        <option value="2" <?= $member['sex_id']==2?'selected':'' ?>>

                            Female

                        </option>

                        <option value="3" <?= $member['sex_id']==3?'selected':'' ?>>

                            Other

                        </option>

                        <option value="4" <?= $member['sex_id']==4?'selected':'' ?>>

                            Prefer Not to Say

                        </option>

                    </select>

                </div>

                <div class="col-md-4">

                    <label class="form-label">

                        Birth Date

                    </label>

                    <input
                        type="date"
                        class="form-control"
                        name="birth_date"
                        value="<?= $member['birth_date'] ?>">

                </div>

            </div>

        </div>

        <div class="content-card mt-4">

            <h4 class="mb-4">

                Contact Information

            </h4>

            <div class="row g-3">

                <div class="col-md-6">

                    <label class="form-label">

                        Email

                    </label>

                    <input
                        type="email"
                        class="form-control"
                        name="primary_email"
                        value="<?= htmlspecialchars($member['primary_email']) ?>">

                </div>

                <div class="col-md-6">

                    <label class="form-label">

                        Mobile Number

                    </label>

                    <input
                        class="form-control"
                        name="primary_mobile"
                        value="<?= htmlspecialchars($member['primary_mobile']) ?>">

                </div>

            </div>

        </div>

        <div class="content-card mt-4">

            <div class="d-flex justify-content-end gap-3">

                <a
                    href="/QAccess/public/members"
                    class="btn btn-outline-qaccess">

                    Cancel

                </a>

                <button
                    class="btn btn-qaccess">

                    <i class="bi bi-floppy"></i>

                    Update Member

                </button>

            </div>

        </div>

    </form>

</div>