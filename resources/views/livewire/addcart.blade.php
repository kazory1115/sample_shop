<div>
    <h5>已加入: {{ $count }}</h5>
    <button wire:click="add" class="btn btn-primary">
        <i class="fa-solid fa-cart-shopping"></i>
    </button>
    <button wire:click="reduce" class="btn btn-danger">
        <i class="fa-solid fa-trash-can"></i>
    </button>
</div>
