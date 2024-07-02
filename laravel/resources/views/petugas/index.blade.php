<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Peternakan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .content {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">{{ Auth::user()->role }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-user mr-2"></i>{{ Auth::user()->role }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <span class="dropdown-item dropdown-header">User Menu</span>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('password.edit', Auth::user()->id) }}" class="dropdown-item">
                                <i class="fas fa-key mr-2"></i> Ubah Password
                            </a>
                            <div class="dropdown-divider"></div>
                        <form action="logout" method="POST">
                            @csrf
                                <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt mr-2"></i>Logout</button>
                        </form>
                    </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container content">
        <div class="col-md-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Ada beberapa masalah dengan inputan Anda.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Peternakan dan Periode Aktif</h3>
                </div>
                <div class="card-body">
                    @foreach ($data as $peternakan)
                        <div class="peternakan">
                            <h4>Peternakan: {{ $peternakan->nama }}</h4>
                            @foreach ($periode as $p)
                                @if ($p->id_peternakan == $peternakan->id)
                                    <a href="{{ route('laporan.create', $p->id) }}" class="btn btn-warning">
                                        + Laporan (Periode ID: {{ $p->id }})
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
