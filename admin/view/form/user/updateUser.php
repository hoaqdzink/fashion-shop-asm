<div class="container mt-5">
    <h2 class="text-center mb-4">Chỉnh sửa tài khoản</h2>
    <div class="user-form">
        <form action="index.php?act=account_update" method="post" enctype="multipart/form-data">
            <div class="row">
                <!-- Email -->
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="hidden" name="user_id" value="<?=$user['user_id']?>">
                    <input type="email" name="email" value="<?=$user['email']?>" class="form-control" id="email" placeholder="Enter Email">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="userId" class="form-label">Password</label>
                    <input type="password" name="password" value="<?=$user['password']?>" class="form-control" id="password" placeholder="*********">
                </div> 
            </div>
            <div class="row">
                <!-- Full Name -->
                <div class="col-md-6 mb-3">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" value="<?=$user['full_name']?>" name="full_name" id="fullName" placeholder="Enter Full Name">
                </div>
                <!-- Date of Birth -->
                <div class="col-md-6 mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="dateOfBirth" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dateOfBirth" name="date_of_birth" value="<?=$user['date_of_birth']?>">
                        </div>
                        <div class="col-md-6">
                            <label for="roleName" class="form-label">Role Name</label>
                            <select class="form-select" id="roleName" name="role_id">
                                <option selected>Choose Role</option>
                                <?php 
                                    if(isset($roles) && count($roles) > 0){
                                        foreach($roles as $item) {
                                            if($item['role_id'] == $user['role_id']){
                                                echo '<option value="'.$item['role_id'].'" selected>'.$item['role_name'].'</option>';
                                            }else{
                                                echo '<option value="'.$item['role_id'].'">'.$item['role_name'].'</option>';
                                            }
                                        }
                                    }
                                ?>
                             </select>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <!-- Avatar -->
                <div class="col-md-6 mb-3">
                    <label for="avatar" class="form-label">Upload Avatar</label>
                    <input type="file" name="avatar" class="form-control" id="avatar" accept="image/*">
                </div>
                <div class="col-md-6 mb-3">
                    <div style="width: 200px; height: 130px; display: flex; align-items: center; justify-content: center; overflow: hidden; border: 1px solid #ccc;">
                        <img src="<?= isset($user['avatar']) && !empty($user['avatar']) ? $user['avatar'] : '../img/image.png' ?>" alt="avatar" style="max-width: 100%; max-height: 100%;">
                    </div>
                </div>
            <div class="text-center">
                <button type="submit" name="account_update" value="submit" class="btn btn-dark">Sửa</button>
            </div>
        </form>
    </div>
</div>
