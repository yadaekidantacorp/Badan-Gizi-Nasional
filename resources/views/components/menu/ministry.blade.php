<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
    <li class="nav-item">
        <a class="nav-link text-active-primary py-5 me-6 {{ request()->is('ministry/*/show') ? 'active' : '' }}" href="{{ route('app.ministry.show', ['ministry' => $this->ministry->slug]) }}" wire:navigate>Overview</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-active-primary py-5 me-6 {{ request()->is('ministry/*/board') ? 'active' : '' }}" href="{{ route('app.ministry.board', ['ministry' => $this->ministry->slug]) }}" wire:navigate>Program Kerja</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-active-primary py-5 me-6 {{ request()->is('ministry/*/document*') ? 'active' : '' }}" href="{{ route('app.ministry.document', ['ministry' => $this->ministry->slug]) }}" wire:navigate>Dokumen</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-active-primary py-5 me-6 {{ request()->is('ministry/*/directorate*') ? 'active' : '' }}" href="{{ route('app.ministry.directorate', ['ministry' => $this->ministry->slug]) }}" wire:navigate>Direktorat</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-active-primary py-5 me-6 {{ request()->is('ministry/*/user*') ? 'active' : '' }}" href="{{ route('app.ministry.user', ['ministry' => $this->ministry->slug]) }}" wire:navigate>Pengguna</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-active-primary py-5 me-6 {{ request()->is('ministry/*/activity') ? 'active' : '' }}" href="{{ route('app.ministry.activity', ['ministry' => $this->ministry->slug]) }}" wire:navigate>Aktivitas</a>
    </li>
</ul>