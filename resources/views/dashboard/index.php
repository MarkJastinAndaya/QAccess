<div class="page">

    <div class="topbar">

        <div class="topbar-title">

            Dashboard

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

            <h1>

                Good Evening,
                <?= htmlspecialchars($username) ?>

            </h1>

            <p>

                Welcome back to the Quirinians' Student Organization Management Portal.

            </p>

        </div>

        <div>

            <button class="btn btn-outline-qaccess">

                <i class="bi bi-download"></i>

                Daily Report

            </button>

            <button class="btn btn-qaccess ms-2">

                <i class="bi bi-plus-circle"></i>

                New Entry

            </button>

        </div>

    </div>

    <div class="row g-4">

        <div class="col-lg-3 col-md-6">

            <div class="dashboard-card">

                <h6>Members</h6>

                <h2>145</h2>

                <small>+12 this semester</small>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="dashboard-card">

                <h6>Users</h6>

                <h2>38</h2>

                <small>2 inactive</small>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="dashboard-card">

                <h6>Events</h6>

                <h2>5</h2>

                <small>Upcoming</small>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="dashboard-card">

                <h6>Announcements</h6>

                <h2>8</h2>

                <small>Published</small>

            </div>

        </div>

    </div>

    <div class="row mt-4">

        <div class="col-lg-8">

            <div class="content-card">

                <h4>

                    Recent Activity

                </h4>

                <div class="activity-item">

                    <div class="activity-avatar">

                        <i class="bi bi-person"></i>

                    </div>

                    <div class="activity-content">

                        <h6>

                            Mark Andaya

                        </h6>

                        <p>

                            Approved membership renewal.

                        </p>

                    </div>

                </div>

                <div class="activity-item">

                    <div class="activity-avatar">

                        <i class="bi bi-file-earmark-text"></i>

                    </div>

                    <div class="activity-content">

                        <h6>

                            Antonette

                        </h6>

                        <p>

                            Uploaded QSO Constitution.pdf

                        </p>

                    </div>

                </div>

                <div class="activity-item">

                    <div class="activity-avatar">

                        <i class="bi bi-calendar-event"></i>

                    </div>

                    <div class="activity-content">

                        <h6>

                            Secretary

                        </h6>

                        <p>

                            Created General Assembly event.

                        </p>

                    </div>

                </div>

                <div class="activity-item">

                    <div class="activity-avatar">

                        <i class="bi bi-cash-stack"></i>

                    </div>

                    <div class="activity-content">

                        <h6>

                            Treasurer

                        </h6>

                        <p>

                            Recorded membership payment.

                        </p>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="content-card">

                <h4>

                    Quick Actions

                </h4>

                <div class="d-grid gap-3">

                    <button class="btn btn-qaccess">

                        <i class="bi bi-person-plus"></i>

                        Add Member

                    </button>

                    <button class="btn btn-outline-qaccess">

                        <i class="bi bi-calendar-plus"></i>

                        Create Event

                    </button>

                    <button class="btn btn-outline-qaccess">

                        <i class="bi bi-upload"></i>

                        Upload Document

                    </button>

                    <button class="btn btn-outline-qaccess">

                        <i class="bi bi-megaphone"></i>

                        Publish Announcement

                    </button>

                </div>

            </div>

            <div class="content-card mt-4">

                <h4>

                    Upcoming Events

                </h4>

                <ul class="list-group list-group-flush">

                    <li class="list-group-item">

                        General Assembly

                    </li>

                    <li class="list-group-item">

                        Officer Meeting

                    </li>

                    <li class="list-group-item">

                        Membership Orientation

                    </li>

                    <li class="list-group-item">

                        Volunteer Activity

                    </li>

                </ul>

            </div>

        </div>

    </div>

</div>