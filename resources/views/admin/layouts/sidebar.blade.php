<div class="adminpanel">
  <div class="sidebar">
    <h1>Admin Panel</h1>
    <nav>
      <div class="logo">
        <img src="/img/logo.webp" alt="Logo" />
        <span>Ecommerce</span>
      </div>
      <ul class="sidebarlist">
        <li><a href="{{route('admin')}}">Dashboard</a></li>
        <li><a href="{{route('category')}}">category</a></li>
        <li>
          <select>
            <option value="">Products</option>
            <option value="">Orders</option>
            <option value="">Manage</option>
            <option value="">Users</option>
          </select>
        </li>
        <li><a href="{{route('brands')}}">Brands</a></li>
        <li><a href="#">Users</a></li>
      </ul>
    </nav>
  </div>
</div>