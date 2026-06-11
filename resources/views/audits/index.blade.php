@extends('layouts.erp')
@section('title', 'Auditoria')
@section('content')
<div class="container">
    <div class="erp-page-header">
        <div>
            <div class="erp-breadcrumb">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <i class="bi bi-chevron-right"></i>
                <span>Auditoria</span>
            </div>
            <h1 class="erp-page-title">Auditoria do Sistema</h1>
            <p class="erp-page-subtitle">Registro completo de eventos e alterações no sistema</p>
        </div>
    </div>

    <div class="erp-table-wrap">
        <table class="erp-table">
            <thead>
                <tr>
                    <th style="width:60px">#ID</th>
                    <th>Usuário</th>
                    <th>Modelo</th>
                    <th style="width:80px">Reg.</th>
                    <th>Ação</th>
                    <th>Data</th>
                    <th style="text-align:center;width:90px">Detalhe</th>
                </tr>
            </thead>
            <tbody>
                @foreach($audits as $audit)
                <tr>
                    <td class="mono">#{{ $audit->id }}</td>
                    <td style="font-weight:600">{{ $audit->user->name ?? 'Sistema' }}</td>
                    <td>
                        <span class="badge bg-secondary">{{ class_basename($audit->model) }}</span>
                    </td>
                    <td class="mono">{{ $audit->model_id }}</td>
                    <td>
                        @php
                            $ev = strtolower($audit->event);
                            $badge = match($ev) {
                                'created' => 'bg-success',
                                'updated' => 'bg-warning',
                                'deleted' => 'bg-danger',
                                default   => 'bg-secondary',
                            };
                        @endphp
                        <span class="badge {{ $badge }}">{{ ucfirst($audit->event) }}</span>
                    </td>
                    <td class="mono" style="font-size:.78rem;color:var(--t2);">{{ $audit->created_at->format('d/m/Y H:i') }}</td>
                    <td style="text-align:center">
                        <button class="btn btn-sm btn-secondary" onclick="toggleAudit({{ $audit->id }})">
                            <i class="bi bi-code-slash" id="icon-{{ $audit->id }}"></i>
                        </button>
                    </td>
                </tr>
                <tr id="audit-{{ $audit->id }}" style="display:none;">
                    <td colspan="7" style="padding:0;background:var(--bg-base);">
                        <div style="padding:1rem 1.25rem;border-top:1px solid var(--bd);display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                            <div>
                                <div class="erp-detail-label" style="margin-bottom:6px;">Antes</div>
                                <pre>{{ json_encode($audit->old_values, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                            </div>
                            <div>
                                <div class="erp-detail-label" style="margin-bottom:6px;">Depois</div>
                                <pre>{{ json_encode($audit->new_values, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $audits->links() }}
    </div>
</div>

@push('scripts')
<script>
function toggleAudit(id) {
    const row = document.getElementById('audit-' + id);
    const icon = document.getElementById('icon-' + id);
    const open = row.style.display === 'table-row';
    row.style.display = open ? 'none' : 'table-row';
    icon.className = open ? 'bi bi-code-slash' : 'bi bi-x-lg';
}
</script>
@endpush
@endsection
