{{-- resources/views/components/university-card.blade.php --}}
<style>
  .uni-card {
    border:1px solid #e5e7eb;
    border-radius:12px;
    padding:16px;
    background:white;
    box-shadow:0 4px 10px rgba(0,0,0,0.03);
    position:relative;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
    transition:box-shadow .2s;
  }
  .uni-card:hover {
    box-shadow:0 6px 16px rgba(0,0,0,0.08);
  }
  .uni-card .logo {
    height:40px;
    margin-bottom:16px;
    display:flex;
    align-items:center;
  }
  .uni-card .logo img {
    max-height:100%;
    max-width:100%;
  }
  .uni-card h3 {
    font-size:16px;
    font-weight:700;
    margin:0 0 6px;
  }
  .uni-card p {
    margin:0;
    font-size:14px;
    color:#475569;
  }
  .card-actions {
    position:absolute;
    top:8px;
    right:8px;
    display:flex;
    gap:6px;
  }
  .card-actions button {
    width:32px;height:32px;border-radius:8px;
    border:1px solid #e5e7eb;background:white;
    display:flex;align-items:center;justify-content:center;
    cursor:pointer;font-size:14px;
    transition:background .2s;
  }
  .card-actions button:hover { background:#f1f5f9; }
</style>

<div class="uni-card">
  <div class="card-actions">
    <button title="Comparer">🔄</button>
    <button title="Favori">❤️</button>
  </div>
  <div class="logo">
    <img src="{{ $logo ?? 'https://via.placeholder.com/120x40?text=Logo' }}" alt="Logo {{ $name ?? 'Université' }}">
  </div>
  <h3>{{ $name ?? 'Université Exemple' }}</h3>
  <p>{{ $city ?? 'Ville' }}</p>
</div>
