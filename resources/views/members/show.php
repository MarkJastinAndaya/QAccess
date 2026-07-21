<div class="page">

    <div class="topbar">

        <div class="topbar-title">

            Member Profile

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

                <?= htmlspecialchars(
                    trim(
                        $member['first_name'].' '.
                        $member['middle_name'].' '.
                        $member['last_name']
                    )
                ) ?>

            </h1>

            <p>

                Member Profile

            </p>

        </div>

        <div>

            <a

                href="/QAccess/public/members/edit?id=<?= $member['member_id'] ?>"

                class="btn btn-qaccess">

                <i class="bi bi-pencil"></i>

                Edit

            </a>

            <a

                href="/QAccess/public/members"

                class="btn btn-outline-qaccess ms-2">

                Back

            </a>

        </div>

    </div>

    <div class="row">

        <div class="col-lg-4">

            <div class="content-card text-center">

                <div
                    class="user-avatar mx-auto mb-3"
                    style="width:90px;height:90px;font-size:32px;">

                    <?= strtoupper(substr($member['first_name'],0,1)) ?>

                </div>

                <h3>

                    <?= htmlspecialchars($member['first_name']) ?>

                </h3>

                <p class="text-secondary-qaccess">

                    QSO Member

                </p>

                <hr>

                <p>

                    <strong>ID</strong><br>

                    <?= $member['member_id'] ?>

                </p>

                <p>

                    <strong>UUID</strong><br>

                    <small>

                        <?= $member['member_uuid'] ?>

                    </small>

                </p>

            </div>

        </div>

        <div class="col-lg-8">

            <div class="content-card">

                <h4 class="mb-4">

                    Personal Information

                </h4>

                <table class="table">

                    <tr>

                        <th width="220">

                            First Name

                        </th>

                        <td>

                            <?= htmlspecialchars($member['first_name']) ?>

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Middle Name

                        </th>

                        <td>

                            <?= htmlspecialchars($member['middle_name']) ?>

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Last Name

                        </th>

                        <td>

                            <?= htmlspecialchars($member['last_name']) ?>

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Sex

                        </th>

                        <td>

                            <?php

                            switch($member['sex_id']){

                                case 1:
                                    echo "Male";
                                    break;

                                case 2:
                                    echo "Female";
                                    break;

                                case 3:
                                    echo "Other";
                                    break;

                                default:
                                    echo "Prefer Not to Say";

                            }

                            ?>

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Birth Date

                        </th>

                        <td>

                            <?= htmlspecialchars($member['birth_date']) ?>

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Email

                        </th>

                        <td>

                            <?= htmlspecialchars($member['primary_email']) ?>

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Mobile Number

                        </th>

                        <td>

                            <?= htmlspecialchars($member['primary_mobile']) ?>

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Created

                        </th>

                        <td>

                            <?= htmlspecialchars($member['created_at']) ?>

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Last Updated

                        </th>

                        <td>

                            <?= htmlspecialchars($member['updated_at']) ?>

                        </td>

                    </tr>

                </table>

            </div>

        </div>

    </div>

</div>