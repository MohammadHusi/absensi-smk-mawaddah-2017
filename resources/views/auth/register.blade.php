<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran Akun | SMK Mawaddah Palengaan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <style>
        * { letter-spacing: 0; box-sizing: border-box; }
        body {
            min-height: 100vh;
            margin: 0;
            background: #f1f5f5;
            color: #18334b;
            font-family: 'DM Sans', sans-serif;
            display: grid;
            grid-template-columns: minmax(300px, 1fr) minmax(420px, 640px);
        }
        .school-panel {
            background: #0f3d2c;
            color: #fff;
            position: relative;
            overflow: hidden;
            padding: clamp(32px, 6vw, 80px);
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            min-height: 100vh;
        }
        .school-panel:before {
            content: '';
            position: absolute;
            width: 510px;
            height: 510px;
            border: 1px solid #ffffff20;
            border-radius: 50%;
            right: -230px;
            bottom: -180px;
            box-shadow: 0 0 0 42px #ffffff08, 0 0 0 85px #ffffff06;
        }
        .school-panel:after {
            content: '';
            position: absolute;
            left: 10%;
            top: 38%;
            width: 140px;
            height: 140px;
            background: #8dd1bd;
            border-radius: 32px;
            transform: rotate(18deg);
            opacity: .13;
        }
        .mark {
            height: 120px;
            width: 120px;
            display: grid;
            place-items: center;
        }
        .mark img {
            width: 110px;
            height: 110px;
            object-fit: contain;
        }
        .school-heading {
            position: relative;
            z-index: 1;
            max-width: 520px;
            margin: 10px 0 0;
        }
        .school-heading .kicker {
            color: #b8e4d8;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 24px;
            letter-spacing: 0.5px;
        }
        .school-heading h1 {
            font: 800 clamp(32px, 3.8vw, 48px)/1.15 'Manrope', sans-serif;
            margin: 40px 0 20px;
        }
        .school-heading p {
            color: #c1d1dc;
            font-size: 15px;
            line-height: 1.7;
            max-width: 440px;
        }
        .benefit-list {
            margin-top: 30px;
            padding: 0;
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 14px;
            position: relative;
            z-index: 1;
        }
        .benefit-list li {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #e3edf2;
            font-size: 14px;
        }
        .benefit-list li i {
            color: #5eead4;
            font-size: 15px;
        }
        .school-footer {
            position: relative;
            z-index: 1;
            color: #9eb3c2;
            font-size: 12px;
            margin-top: auto;
            padding-top: 30px;
        }
        .register-panel {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 32px;
            background: #fff;
            overflow-y: auto;
            max-height: 100vh;
        }
        .register-box {
            width: 100%;
            max-width: 520px;
        }
        .register-box .mini-mark {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            background: #e4f3ee;
            color: #176b61;
            display: grid;
            place-items: center;
            font-size: 19px;
            margin-bottom: 20px;
        }
        .register-box h2 {
            font: 800 26px 'Manrope', sans-serif;
            margin: 0 0 6px;
        }
        .register-box p.subtitle {
            color: #788997;
            margin: 0 0 24px;
            font-size: 14px;
        }
        .role-selector {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-bottom: 22px;
        }
        .role-option {
            cursor: pointer;
            border: 2px solid #e1e8ed;
            border-radius: 10px;
            padding: 12px 8px;
            text-align: center;
            transition: all .2s ease;
            background: #fbfcfd;
        }
        .role-option:hover {
            border-color: #1a8f4c;
            background: #f2faf5;
        }
        .role-option input[type="radio"] {
            display: none;
        }
        .role-option.active {
            border-color: #1a8f4c;
            background: #ebf7f0;
            color: #0f3d2c;
            box-shadow: 0 2px 8px rgba(26, 143, 76, 0.15);
        }
        .role-option i {
            font-size: 20px;
            display: block;
            margin-bottom: 6px;
            color: #4b6358;
        }
        .role-option.active i {
            color: #1a8f4c;
        }
        .role-option .role-label {
            font-size: 13px;
            font-weight: 700;
        }
        .form-label {
            font-size: 12px;
            font-weight: 700;
            color: #2b455b;
            margin-bottom: 6px;
        }
        .form-control, .form-select {
            min-height: 46px;
            border-color: #dce5e9;
            border-radius: 8px;
            font-size: 14px;
        }
        .form-control:focus, .form-select:focus {
            border-color: #1a8f4c;
            box-shadow: 0 0 0 .2rem #1a8f4c18;
        }
        .input-wrap {
            position: relative;
        }
        .input-wrap i {
            position: absolute;
            top: 15px;
            left: 14px;
            color: #8597a3;
            font-size: 14px;
        }
        .input-wrap .form-control {
            padding-left: 40px;
        }
        .btn-enter {
            min-height: 48px;
            background: #1a8f4c;
            color: #fff;
            font-weight: 700;
            border-radius: 8px;
            font-size: 15px;
            transition: background .2s ease;
        }
        .btn-enter:hover {
            background: #136b39;
            color: #fff;
        }
        .login-help {
            font-size: 13px;
            color: #64748b;
            margin-top: 22px;
            text-align: center;
        }
        .login-help a {
            color: #1a8f4c;
            font-weight: 700;
            text-decoration: none;
        }
        .login-help a:hover {
            text-decoration: underline;
        }
        @media(max-width: 860px) {
            body {
                display: block;
                background: #fff;
            }
            .school-panel {
                min-height: unset;
                padding: 30px 22px 24px;
            }
            .school-heading h1 {
                font-size: 28px;
                margin: 20px 0 10px;
            }
            .school-heading p, .benefit-list, .school-footer {
                display: none;
            }
            .register-panel {
                padding: 30px 20px 40px;
                max-height: unset;
            }
            .register-box .mini-mark {
                display: none;
            }
        }
    </style>
</head>
<body>
    <section class="school-panel">
        <div class="mark">
            <img src="{{ asset('logo.png') }}" alt="Logo SMK Mawaddah">
        </div>
        <div class="school-heading">
            <div class="kicker">SMK Mawaddah Palengaan</div>
            <h1>Pendaftaran Akun Baru<br><span style="font-size: 0.72em; font-weight: 700; color: #b8e4d8;">Presensi Digital</span></h1>
            <p>Daftarkan akun sekolah Anda baik sebagai Murid, Guru, maupun Tenaga Pendidik / Admin untuk akses sistem kehadiran terintegrasi.</p>
            <ul class="benefit-list">
                <li><i class="fa-solid fa-circle-check"></i> Pencatatan kehadiran real-time & transparan</li>
                <li><i class="fa-solid fa-circle-check"></i> Monitoring jadwal pembelajaran harian</li>
                <li><i class="fa-solid fa-circle-check"></i> Akun langsung aktif dan terhubung ke kelas</li>
            </ul>
        </div>
        <div class="school-footer">© {{ date('Y') }} SMK Mawaddah Palengaan</div>
    </section>

    <main class="register-panel">
        <div class="register-box">
            <div class="mini-mark">
                <i class="fa-solid fa-user-plus"></i>
            </div>
            <h2>Daftar Akun</h2>
            <p class="subtitle">Pilih jenis akun dan lengkapi data diri Anda.</p>

            @if($errors->any())
                <div class="alert alert-danger py-2 mb-3 small">
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register.store') }}" id="registerForm">
                @csrf

                <!-- Role Selection -->
                <label class="form-label d-block mb-2">Daftar Sebagai:</label>
                <div class="role-selector">
                    <label class="role-option {{ old('role', 'murid') === 'murid' ? 'active' : '' }}" id="role-murid-card">
                        <input type="radio" name="role" value="murid" {{ old('role', 'murid') === 'murid' ? 'checked' : '' }} onchange="toggleRole('murid')">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <span class="role-label">Murid</span>
                    </label>
                    <label class="role-option {{ old('role') === 'guru' ? 'active' : '' }}" id="role-guru-card">
                        <input type="radio" name="role" value="guru" {{ old('role') === 'guru' ? 'checked' : '' }} onchange="toggleRole('guru')">
                        <i class="fa-solid fa-chalkboard-user"></i>
                        <span class="role-label">Guru</span>
                    </label>
                    <label class="role-option {{ old('role') === 'admin' ? 'active' : '' }}" id="role-admin-card">
                        <input type="radio" name="role" value="admin" {{ old('role') === 'admin' ? 'checked' : '' }} onchange="toggleRole('admin')">
                        <i class="fa-solid fa-user-shield"></i>
                        <span class="role-label">Admin</span>
                    </label>
                </div>

                <!-- Nama Lengkap -->
                <div class="mb-3">
                    <label class="form-label" for="nama">Nama Lengkap</label>
                    <div class="input-wrap">
                        <i class="fa-regular fa-id-card"></i>
                        <input class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required placeholder="Contoh: Achmad Roziqin">
                    </div>
                </div>

                <div class="row">
                    <!-- Username -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="username">Username</label>
                        <div class="input-wrap">
                            <i class="fa-regular fa-user"></i>
                            <input class="form-control" id="username" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="roziqin123">
                        </div>
                    </div>

                    <!-- Email (Opsional) -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="email">Email <span class="text-muted fw-normal">(Opsional)</span></label>
                        <div class="input-wrap">
                            <i class="fa-regular fa-envelope"></i>
                            <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com">
                        </div>
                    </div>
                </div>

                <!-- Bagian Khusus Murid -->
                <div id="section-murid" style="{{ old('role', 'murid') === 'murid' ? '' : 'display:none;' }}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="kelas_id">Kelas <span class="text-danger">*</span></label>
                            <select class="form-select" id="kelas_id" name="kelas_id">
                                <option value="">-- Pilih Kelas --</option>
                                @foreach($classes as $c)
                                    <option value="{{ $c->id }}" {{ old('kelas_id') == $c->id ? 'selected' : '' }}>
                                        {{ $c->nama_kelas }} {{ $c->jurusan ? '('.$c->jurusan.')' : '' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="nisn">NISN <span class="text-muted fw-normal">(Opsional)</span></label>
                            <div class="input-wrap">
                                <i class="fa-solid fa-hashtag"></i>
                                <input class="form-control" id="nisn" name="nisn" value="{{ old('nisn') }}" placeholder="00xxxxxxxx">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bagian Khusus Guru -->
                <div id="section-guru" style="{{ old('role') === 'guru' ? '' : 'display:none;' }}">
                    <div class="mb-3">
                        <label class="form-label" for="nip">NIP / NUPTK <span class="text-muted fw-normal">(Opsional)</span></label>
                        <div class="input-wrap">
                            <i class="fa-solid fa-address-book"></i>
                            <input class="form-control" id="nip" name="nip" value="{{ old('nip') }}" placeholder="Nomor Induk Pegawai">
                        </div>
                    </div>
                </div>

                <!-- Data Pelengkap (Murid & Guru) -->
                <div id="section-pelengkap" style="{{ old('role', 'murid') !== 'admin' ? '' : 'display:none;' }}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="">-- Pilih --</option>
                                <option value="L" {{ old('jenis_kelamin') === 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ old('jenis_kelamin') === 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="no_hp">No. WhatsApp / HP</label>
                            <div class="input-wrap">
                                <i class="fa-brands fa-whatsapp"></i>
                                <input class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" placeholder="08xxxxxxxxxx">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Password -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-wrap">
                            <i class="fa-solid fa-lock"></i>
                            <input class="form-control" id="password" type="password" name="password" required placeholder="Bebas karakter apa saja (min. 4)">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label" for="password_confirmation">Ulangi Password</label>
                        <div class="input-wrap">
                            <i class="fa-solid fa-shield-halved"></i>
                            <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required placeholder="Ketik ulang password">
                        </div>
                    </div>
                </div>

                <button class="btn btn-enter w-100 mb-3" type="submit">
                    Daftar Sekarang <i class="fa-solid fa-arrow-right ms-2"></i>
                </button>
            </form>

            <div class="login-help">
                Sudah memiliki akun? <a href="{{ route('login') }}">Masuk ke Akun Anda</a>
            </div>
        </div>
    </main>

    <script>
        function toggleRole(role) {
            document.querySelectorAll('.role-option').forEach(el => el.classList.remove('active'));
            const card = document.getElementById('role-' + role + '-card');
            if (card) card.classList.add('active');

            const sectionMurid = document.getElementById('section-murid');
            const sectionGuru = document.getElementById('section-guru');
            const sectionPelengkap = document.getElementById('section-pelengkap');
            const kelasInput = document.getElementById('kelas_id');

            if (role === 'murid') {
                sectionMurid.style.display = 'block';
                sectionGuru.style.display = 'none';
                sectionPelengkap.style.display = 'block';
                kelasInput.setAttribute('required', 'required');
            } else if (role === 'guru') {
                sectionMurid.style.display = 'none';
                sectionGuru.style.display = 'block';
                sectionPelengkap.style.display = 'block';
                kelasInput.removeAttribute('required');
            } else {
                sectionMurid.style.display = 'none';
                sectionGuru.style.display = 'none';
                sectionPelengkap.style.display = 'none';
                kelasInput.removeAttribute('required');
            }
        }
    </script>
</body>
</html>
