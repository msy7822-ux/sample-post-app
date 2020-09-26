<form action="{{ url('/create') }}" method="post">
    @csrf

    <div>
        <label>Name</label><br />
        <input type="text" name="author" value="" placeholder="お名前">
    </div>
    <div>
        <label>Title</label><br />
        <input type="text" name="title" value="" placeholder="タイトル">
    </div>
    <div>
        <label>Body</label><br />
        <textarea name="body" placeholder="本文"></textarea>
    </div>

    <input type="submit" value="投稿">
</form>

