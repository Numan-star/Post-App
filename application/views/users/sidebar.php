<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="" class="brand-link">
        <span class="brand-text font-weight-light">Facebook App</span>
    </a>

    <div class="sidebar">
        <div class="form-inline mt-5">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'welcome/home' ?>" class="nav-link">
                                <i class="nav-icon fa-solid fa-house-user"></i>
                                <p>Welcome Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'welcome/userProfilePic' ?>" class="nav-link">
                                <i class="nav-icon fa-solid fa-image"></i>
                                <p>Upload Profile Pic</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'post/viewYourProfile' ?>" class="nav-link">
                                <i class="nav-icon fa-solid fa-user-pen"></i>
                                <p>View / Edit your Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'welcome/user' ?>" class="nav-link">
                                <i class="nav-icon fa-solid fa-address-card"></i>
                                <p>Create Post</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'post/viewYourPost' ?>" class="nav-link">
                                <i class="nav-icon fa-solid fa-address-card"></i>
                                <p>View Your Posts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'post/viewOtherPost' ?>" class="nav-link">
                                <i class="nav-icon fa-solid fa-users-viewfinder"></i>
                                <p>View Other People Posts</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</aside>