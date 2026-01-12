<div class="container py-5 text-center">
    <h1 class="mb-3">{{ $title }}</h1>
    <p class="text-muted">
        🚧 This page is coming soon.
    </p>

    <a href="{{ url('/') }}" class="btn btn-primary mt-3">
        Back to Home
    </a>
</div>
<style>
    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
        background: white;
        border-radius: 10px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        padding: 60px 40px !important;
        max-width: 500px;
    }

    h1 {
        color: #333;
        font-weight: 700;
        font-size: 2.5rem !important;
    }

    .text-muted {
        font-size: 1.2rem;
        color: #666 !important;
        margin-bottom: 30px !important;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        padding: 12px 30px;
        font-size: 1rem;
        font-weight: 600;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
    }
</style>