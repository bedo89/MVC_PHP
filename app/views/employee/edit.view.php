
<form autocomplete="off" class="appForm clearfix" method="post" enctype="application/x-www-form-urlencoded">
    <fieldset>
        <legend>تفاصيل بيانات الموظف</legend>
        <div class="input_wrapper n40 border">
            <label class="floated">اسم الموظف</label>
            <input required type="text" name="name" id="name" maxlength="50" value="<?= $employee->name ?>">
        </div>
        <div class="input_wrapper n40 padding border">
            <label class="floated">عنوان الموظف</label>
            <input required type="text" id="address" name="address" maxlength="100" value="<?= $employee->address ?>">
        </div>
        <div class="input_wrapper_other n20 padding">
            <label>الجنس</label>
            <label class="radio">
                <input type="radio" name="gender" id="gender" value="1" <?= $employee->gender == 1 ? 'checked' : '' ?>>
                <div class="radio_button"></div>
                <span>ذكر</span>
            </label>
            <label class="radio">
                <input type="radio" name="gender" id="gender" value="2" <?= $employee->gender == 2 ? 'checked' : '' ?>>
                <div class="radio_button"></div>
                <span>أنثى</span>
            </label>
        </div>
        <div class="input_wrapper n30 border">
            <label class="floated">العمر</label>
            <input required type="number" min="22" max="60" name="age" id="age" value="<?= $employee->age ?>">
        </div>
        <div class="input_wrapper n20 padding border">
            <label class="floated">المرتب</label>
            <input required type="number" id="salary" step="0.01" name="salary" min="1500" max="9000" value="<?= $employee->salary ?>">
        </div>
        <div class="input_wrapper n20 padding border">
            <label class="floated">الخصم على الموظف</label>
            <input required type="number" id="tax" step="0.01" name="tax" min="1" max="5" value="<?= $employee->tax ?>">
        </div>
        <div class="input_wrapper_other n30 padding select">
            <select required name="type" id="type">
                <option value="">اختر نظام العمل</option>
                <option value="1" <?= $employee->type == 1 ? 'selected' : '' ?>>دوام جزئي</option>
                <option value="2" <?= $employee->type == 2 ? 'selected' : '' ?>>دوام كامل</option>
            </select>
        </div>

        <div class="input_wrapper_other">
            <label>نظام التشغيل</label>
            <label class="checkbox block">
                <input type="checkbox" name="os[]" id="os" value="1" <?= (@in_array(1, unserialize($employee->os))) ? 'checked' : '' ?>>
                <div class="checkbox_button"></div>
                <span>ويندوز</span>
            </label>
            <label class="checkbox block">
                <input type="checkbox" name="os[]" id="os" value="2" <?= (@in_array(2, unserialize($employee->os))) ? 'checked' : '' ?>>
                <div class="checkbox_button"></div>
                <span>لينكس</span>
            </label>
            <label class="checkbox block">
                <input type="checkbox" name="os[]" id="os" value="3" <?= (@in_array(3, unserialize($employee->os))) ? 'checked' : '' ?>>
                <div class="checkbox_button"></div>
                <span>ماك</span>
            </label>
        </div>
        <div class="input_wrapper_other">
            <label>مﻻحظات</label>
            <textarea name="notes" id="notes" cols="30" rows="10"><?= $employee->notes ?></textarea>
        </div>
        <input type="submit" name="submit" value="حفظ">
    </fieldset>
</form>