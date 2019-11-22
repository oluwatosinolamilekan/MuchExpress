<template>
<div class="card">
    <div class="card-header">
        <!-- slot for title -->
        <slot name="title"></slot>
    </div>
    <div class="card-body">
        <!-- slot for body -->
        <slot name="body"></slot>
    </div>
</div>
</template>

<script>
export default {
    
}
</script>