@foreach ($data as $logHeader)
    <a href="#" class="dropdown-item">
        <div class="dropdown-item-icon bg-info text-white">
            <i class="fas fa-bell"></i>
        </div>
        <div class="dropdown-item-desc">
            {{ $logHeader->description }}
            <div class="time"> {{ $logHeader->created_at->diffForHumans() }}</div>
        </div>
    </a>
@endforeach
