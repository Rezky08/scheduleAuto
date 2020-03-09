<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <!-- <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Overview</span>
        </a>
    </li> -->
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Master Tabel</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('Ruang') ?>">List Ruangan</a>
            <a class="dropdown-item" href="<?php echo site_url('Prodi') ?>">List Prodi</a>
            <a class="dropdown-item" href="<?php echo site_url('Hari') ?>">List Hari</a>
            <a class="dropdown-item" href="<?php echo site_url('Jam') ?>">List Jam</a>
        </div>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>List Tabel</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('Matkul') ?>">Set Matakuliah</a>
            <a class="dropdown-item" href="<?php echo site_url('Waktu') ?>">Set Waktu</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Ruangwaktu') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Set Ruang Waktu</span></a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span></a>
    </li> -->
</ul>
