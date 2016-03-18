<div class="input-group">
    <label for="name">Name: </label>
    <input type="text" name="name" id="name" <?php if(isset($employee)) {echo 'value="'. $employee['name'] . '"';} ?>>
</div>

<div class="input-group">
    <label for="email">Email: </label>
    <input type="email" name="email" id="email" <?php if(isset($employee)) {echo 'value="'. $employee['email'] . '"';} ?>>
</div>

<div class="input-group">
    <label for="role">Role: </label>
    <select name="role" id="role">
        <?php foreach($roles as $role): ?>
            <option value="<?php echo $role['id']; ?>" <?php if(isset($employee) && $role['id'] == $employee['role_id']) {echo 'selected';} ?>><?php echo $role['name']; ?></option>
        <?php endforeach; ?>
    </select>
</div>

<div class="input-group">
    <label for="admin">Admin? </label>
    <input type="checkbox" name="admin" id="admin" value="yes" <?php if(isset($employee) && $employee['admin'] == true) {echo 'checked';} ?>>
</div>

<div class="input-group">
    <label for="comments">Comments: </label>
    <textarea name="comments" id="comments"><?php if(isset($employee)) {echo $employee['comments'];} ?></textarea>
</div>