<div>
    <input type="text" wire:model="search" class="form-control" placeholder="Buscar...">
    <ul>
            @foreach ($results as $result)
                <li>{{ $result }}</li>
            @endforeach
    </ul>
</div>