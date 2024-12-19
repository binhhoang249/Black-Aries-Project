    document.querySelector('.edit-avatar-btn').addEventListener('click', () => {
        const newImage = prompt("Nhập URL hình ảnh mới:");
        if (newImage) {
            document.querySelector('.logo-container img').src = newImage;
        }
    });