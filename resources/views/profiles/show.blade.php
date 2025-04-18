<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PUT')

    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" required>

    <button type="submit">Update</button>
</form>
