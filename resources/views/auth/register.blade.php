<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta — NexusERP</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        :root {
            --bg-base:#07091A;--bg-surface:#0D1226;--bg-card:#111830;--bg-raised:#16203C;
            --accent:#3D7FFF;--accent-dim:rgba(61,127,255,.14);--accent-glow:rgba(61,127,255,.35);
            --emerald:#00C07A;--emerald-dim:rgba(0,192,122,.13);
            --danger:#FF3D5A;--danger-dim:rgba(255,61,90,.13);
            --bd:#1C2840;--bd-light:#253350;
            --t1:#E2E8F4;--t2:#8899BB;--t3:#4A5A7A;
            --sans:'Plus Jakarta Sans',sans-serif;--r:8px;
        }
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
        html,body{height:100%;}
        body{font-family:var(--sans);background:var(--bg-base);color:var(--t1);-webkit-font-smoothing:antialiased;}

        .auth-wrap{display:flex;min-height:100vh;}

        .auth-brand {
            flex:0 0 38%; background:var(--bg-surface);
            border-right:1px solid var(--bd);
            display:flex; flex-direction:column;
            align-items:center; justify-content:center;
            padding:3rem; position:relative; overflow:hidden;
        }
        .auth-brand::before {
            content:''; position:absolute; inset:0;
            background:
                radial-gradient(ellipse at 20% 30%, rgba(0,192,122,.15) 0%, transparent 60%),
                radial-gradient(ellipse at 90% 80%, rgba(61,127,255,.12) 0%, transparent 55%);
        }
        .auth-brand__dots {
            position:absolute; inset:0;
            background-image:radial-gradient(rgba(255,255,255,.03) 1px, transparent 1px);
            background-size:28px 28px;
        }
        .auth-brand__inner{position:relative;z-index:1;text-align:center;}
        .auth-brand__logo {
            width:64px; height:64px;
            background:linear-gradient(135deg, var(--emerald) 0%, var(--accent) 100%);
            border-radius:18px; display:flex; align-items:center; justify-content:center;
            font-size:1.9rem; margin:0 auto 1.75rem;
            box-shadow:0 12px 40px rgba(0,192,122,.3);
        }
        .auth-brand__name{font-size:2rem;font-weight:900;letter-spacing:-.05em;color:var(--t1);margin-bottom:.4rem;}
        .auth-brand__tagline{font-size:.875rem;color:var(--t3);line-height:1.6;max-width:260px;margin:0 auto 2rem;}
        .auth-steps{display:flex;flex-direction:column;gap:.5rem;text-align:left;}
        .auth-step{display:flex;align-items:flex-start;gap:.75rem;}
        .auth-step__num{
            width:22px;height:22px;background:var(--accent-dim);border:1px solid var(--accent);
            border-radius:50%;display:flex;align-items:center;justify-content:center;
            font-size:.65rem;font-weight:800;color:var(--accent);flex-shrink:0;margin-top:1px;
        }
        .auth-step__text{font-size:.78rem;color:var(--t2);line-height:1.45;}

        .auth-form-panel{
            flex:1;display:flex;align-items:center;justify-content:center;
            padding:2.5rem 2rem;background:var(--bg-base);overflow-y:auto;
        }
        .auth-form-inner{width:100%;max-width:420px;}
        .auth-form-inner h2{font-size:1.5rem;font-weight:800;letter-spacing:-.03em;margin-bottom:.3rem;}
        .auth-form-sub{font-size:.84rem;color:var(--t3);margin-bottom:1.75rem;}

        .form-group{margin-bottom:1.1rem;}
        .form-label{display:block;font-size:.72rem;font-weight:700;color:var(--t2);letter-spacing:.05em;text-transform:uppercase;margin-bottom:5px;}
        .form-input{
            width:100%;background:var(--bg-surface);border:1px solid var(--bd-light);
            border-radius:var(--r);color:var(--t1);font-size:.875rem;font-family:var(--sans);
            padding:10px 13px;transition:border-color .15s,box-shadow .15s;appearance:none;
        }
        .form-input:focus{outline:none;border-color:var(--accent);box-shadow:0 0 0 3px var(--accent-dim);background:var(--bg-raised);}
        .form-input::placeholder{color:var(--t3);}
        .form-input.is-invalid{border-color:var(--danger);}
        .form-error{color:#ff7088;font-size:.75rem;margin-top:4px;}

        .btn-auth{
            width:100%;background:var(--accent);border:1px solid var(--accent);
            color:#fff;font-family:var(--sans);font-size:.875rem;font-weight:700;
            padding:11px 20px;border-radius:var(--r);cursor:pointer;
            transition:background .13s,box-shadow .13s;display:flex;align-items:center;justify-content:center;gap:8px;
        }
        .btn-auth:hover{background:#5a93ff;box-shadow:0 6px 20px var(--accent-glow);}
        .auth-divider{text-align:center;margin:1.5rem 0;position:relative;color:var(--t3);font-size:.74rem;}
        .auth-divider::before{content:'';position:absolute;top:50%;left:0;right:0;height:1px;background:var(--bd);}
        .auth-divider span{background:var(--bg-base);padding:0 12px;position:relative;}
        .btn-link-auth{
            display:flex;align-items:center;justify-content:center;gap:7px;
            width:100%;background:var(--bg-raised);border:1px solid var(--bd-light);
            color:var(--t2);font-family:var(--sans);font-size:.825rem;font-weight:600;
            padding:9px 20px;border-radius:var(--r);cursor:pointer;
            transition:background .13s,color .13s;text-decoration:none;
        }
        .btn-link-auth:hover{background:var(--bg-hover);color:var(--t1);}
        .alert-auth{
            background:var(--danger-dim);border:1px solid rgba(255,61,90,.3);
            color:#ff7088;border-radius:var(--r);padding:10px 14px;
            font-size:.82rem;margin-bottom:1.25rem;display:flex;align-items:flex-start;gap:8px;
        }
        @media (max-width:768px){
            .auth-brand{display:none;}
            .auth-form-panel{padding:2rem 1.25rem;}
        }
    </style>
</head>
<body>
<div class="auth-wrap">
    <div class="auth-brand">
        <div class="auth-brand__dots"></div>
        <div class="auth-brand__inner">
            <div class="auth-brand__logo"><i class="bi bi-person-plus-fill" style="color:#fff"></i></div>
            <div class="auth-brand__name">NexusERP</div>
            <p class="auth-brand__tagline">Crie sua conta e comece a gerenciar sua empresa de forma inteligente.</p>
            <div class="auth-steps">
                <div class="auth-step">
                    <div class="auth-step__num">1</div>
                    <div class="auth-step__text">Preencha seus dados de acesso</div>
                </div>
                <div class="auth-step">
                    <div class="auth-step__num">2</div>
                    <div class="auth-step__text">Acesse o painel completo do ERP</div>
                </div>
                <div class="auth-step">
                    <div class="auth-step__num">3</div>
                    <div class="auth-step__text">Configure sua empresa e módulos</div>
                </div>
            </div>
        </div>
    </div>

    <div class="auth-form-panel">
        <div class="auth-form-inner">
            <h2>Criar nova conta</h2>
            <p class="auth-form-sub">Preencha os dados abaixo para começar</p>

            @if(session('error'))
                <div class="alert-auth"><i class="bi bi-exclamation-triangle-fill"></i>{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label class="form-label">Nome completo</label>
                    <input type="text" name="name" class="form-input {{ $errors->has('name') ? 'is-invalid' : '' }}"
                           placeholder="Seu nome" value="{{ old('name') }}" required>
                    @error('name')<div class="form-error">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-input {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           placeholder="seu@email.com" value="{{ old('email') }}" required>
                    @error('email')<div class="form-error">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Senha</label>
                    <input type="password" name="password" class="form-input {{ $errors->has('password') ? 'is-invalid' : '' }}"
                           placeholder="Mínimo 6 caracteres" required>
                    @error('password')<div class="form-error">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Confirmar senha</label>
                    <input type="password" name="password_confirmation" class="form-input"
                           placeholder="Repita a senha" required>
                </div>

                <button type="submit" class="btn-auth">
                    <i class="bi bi-person-check-fill"></i> Criar minha conta
                </button>
            </form>

            <div class="auth-divider"><span>Já tem uma conta?</span></div>
            <a href="{{ route('login') }}" class="btn-link-auth">
                <i class="bi bi-box-arrow-in-right"></i> Fazer login
            </a>
        </div>
    </div>
</div>
</body>
</html>
