class SideMenu extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
        <div class="area"></div>
        <nav class="main-menu">
          <ul>
            <li>
              <a href="../index.php/../">
                <i class="fa bi bi-house-fill fa-2x"></i>
                <span class="nav-text"> Home </span>
              </a>
            </li>
            <li class="has-subnav">
              <a href="../peserta/readPeserta.php">
                <i class="fa bi bi-person-lines-fill fa-2x"></i>
                <span class="nav-text"> Data Peserta </span>
              </a>
            </li>
            <li class="has-subnav">
              <a href="../peserta/createPeserta.php">
              <i class="fa bi bi-person-plus-fill fa-2x"></i>
                <span class="nav-text"> Tambah Peserta </span>
              </a>
            </li>
            <li class="has-subnav">
              <a href="../presensi/readPresensi.php">
                <i class="fa bi bi-calendar2-check-fill fa-2x"></i>
                <span class="nav-text"> Data Presensi </span>
              </a>
            </li>
            <li>
              <a href="../presensi/createPresensi.php">
                <i class="fa bi bi-file-plus-fill fa-2x"></i>
                <span class="nav-text"> Tambah Presensi </span>
              </a>
            </li>
            <li>
              <a href="../pengajar/readPengajar.php">
                <i class="fa bi bi-person-badge-fill" fa-2x></i>
                <span class="nav-text"> Data Pengajar </span>
              </a>
            </li>
            <li>
              <a href="../pengajar/createPengajar.php">
                <i class="fa bi bi-person-plus-fill fa-2x"></i>
                <span class="nav-text"> Tambah Pengajar </span>
              </a>
            </li>
          </ul>

          <ul class="logout">
            <li>
              <a href="../logout.php">
                <i class="fa bi bi-box-arrow-in-left fa-2x"></i>
                <span class="nav-text"> Logout </span>
              </a>
            </li>
          </ul>
        </nav>
    `;
  }
}

customElements.define("side-menu", SideMenu);
