<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php if (! empty($article->errors)): ?>
    <?php foreach ($article->errors as $error): ?>
        <li><?= htmlspecialchars($error) ?></li>    
    <?php endforeach; ?>    
<?php endif; ?>    

<form method="post">

    <div>
        <label for="title">Title</label>
        <input name="title" id="title" placeholder="Article title"
               value="<?= htmlspecialchars($article->title ?? '') ?>">
    </div>

    <div>
        <label for="content">Content</label>
        <textarea name="content" rows="4" cols="40" id="content" placeholder="Article content"><?= htmlspecialchars($article->content ?? '') ?></textarea> 
    </div>

    <div>
        <label for="published_at">Publication date & time</label>
        <input type="text" name="published_at" id="published_at"
               value="<?= htmlspecialchars($article->published_at ?? '') ?>">
    </div>
<fieldset>
    <legend>Categories</legend>

    <?php foreach ($categories as $category) : ?>
        <div>
            <input 
                type="checkbox" 
                name="category[]" 
                value="<?= $category['id'] ?>" 
                id="category<?= $category['id'] ?>"
                <?= in_array($category['id'], $category_ids) ? 'checked' : '' ?>
            >
            <label for="category<?= $category['id'] ?>">
                <?= htmlspecialchars($category['name']) ?>
            </label>
        </div>
    <?php endforeach; ?> 
</fieldset>



    <button>Save Article</button> 

</form>