<div class="container mt-5">
    <h2 class="text-center mb-4">Thêm tài khoản</h2>
    <div class="user-form">
        <form action="index.php?act=adduser" method="post" enctype="multipart/form-data">
            <div class="row">
                <!-- Email -->
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="hidden" name="user_id">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="userId" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="*********">
                </div> 
            </div>
            <div class="row">
                <!-- Full Name -->
                <div class="col-md-6 mb-3">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="full_name" id="fullName" placeholder="Enter Full Name">
                </div>
                <!-- Date of Birth -->
                <div class="col-md-6 mb-3">
                    <label for="dateOfBirth" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dateOfBirth" name="date_of_birth" value="2024-01-01">
                </div>
            </div>
            <div class="row">
                <!-- Avatar -->
                <div class="col-md-6 mb-3">
                    <label for="avatar" class="form-label">Upload Avatar</label>
                    <input type="file" name="avatar" class="form-control" id="avatar" accept="image/*" required>
                </div>
                <!-- Role Name -->
                <div class="col-md-6 mb-3">
                    <label for="roleName" class="form-label">Role Name</label>
                    <select class="form-select" id="roleName" name="role_id">
                        <option selected>Choose Role</option>
                        <?php 
                            if(isset($roles) && count($roles) > 0){
                                foreach($roles as $item) {
                                    echo '<option value="'.$item['role_id'].'">'.$item['role_name'].'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" name="adduser" value="submit" class="btn btn-dark">Thêm</button>
            </div>
        </form>
    </div>
</div>
