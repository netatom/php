<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>Simple CRUD</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body>

<div x-data="MyProduct">
    <h2>Items</h2>
    <input type="text" x-model="newName" placeholder="name input">
    <input type="text" x-model="newDetail" placeholder="detail input">
    <button @click="addProduct()">등록</button>

    <ul>
        <template x-for="product in products" :key="product.id">
            <li>
                <span x-text="product.name"></span> - 
                <span x-text="product.detail"></span>
                <button @click="deleteProduct(product.id)">삭제</button>
            </li>
        </template>
    </ul>
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('MyProduct', () => ({
        products: [],
        newName: '',
        newDetail: '',

        async fetchProducts() {
            let res = await fetch('/board/public/api/products');
            let data = await res.json();
            this.products = data.data;
        },

        async addProduct() {
            if (this.newName.trim() && this.newDetail.trim()) {
                let res = await fetch('/board/public/api/products', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ name: this.newName, detail: this.newDetail })
                });

                if (res.ok) {
                    this.newName = '';
                    this.newDetail = '';
                    this.fetchProducts();
                }
            }
        },

        async deleteProduct(id) {
            let res = await fetch(`/board/public/api/products/${id}`, { method: 'DELETE' });
            if (res.ok) {
                this.fetchProducts();
            }
        },

        init() {
            this.fetchProducts();
        }
    }));
});
</script>

</body>
</html>
