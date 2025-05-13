$('.upload-btn').on('click', function () {
    $(this).siblings('.file-input').click();
});

$('.file-input').on('change', function () {
    const file = this.files[0];
    if (!file) return;

    const wrapper = $(this).closest('.file-upload-wrapper');
    const preview = wrapper.find('.file-preview');
    const button = wrapper.find('.upload-btn');

    preview.empty(); // Önceki içerikleri temizle
    const fileType = file.type;
    const fileURL = URL.createObjectURL(file);

    const closeButton = $('<span>', {
        class: 'position-absolute top-0 start-0 bg-danger text-white px-2 py-1',
        style: 'cursor: pointer; z-index: 10;',
        html: '&times;'
    }).on('click', function () {
        wrapper.find('.file-input').val('');
        preview.addClass('d-none').empty();
        button.removeClass('d-none');
    });

    if ($(this).data('type') === 'image' && fileType.startsWith('image/')) {
        const image = $('<img>', {
            src: fileURL,
            class: 'img-fluid rounded border',
            style: 'max-height: 200px;'
        });
        preview.append(closeButton).append(image);
    } else {
        const icon = $('<i>', { class: 'fa fa-file-alt fa-4x text-info mb-2' });
        const fileName = $('<div>', { text: file.name, class: 'text-center' });
        const container = $('<div>', {
            class: 'd-flex flex-column align-items-center border rounded p-3',
            style: 'background-color: #f1f1f1; min-height: 200px;'
        });
        container.append(icon).append(fileName);
        preview.append(closeButton).append(container);
    }

    preview.removeClass('d-none');
    button.addClass('d-none');
});

// Çoklu görsel yükleme için buton tıklaması
$('.upload-multiple-btn').on('click', function () {
    $(this).siblings('.multiple-images-input').click();
});

// Çoklu görsel seçilince önizleme
$('.multiple-images-input').on('change', function () {
    const files = this.files;
    const wrapper = $(this).closest('.file-upload-wrapper');
    const previewContainer = wrapper.find('.multiple-preview');

    //previewContainer.empty(); // Önceki önizlemeleri temizle

    if (files.length === 0) return;

    Array.from(files).forEach((file, index) => {
        const fileURL = URL.createObjectURL(file);
        const imageWrapper = $('<div>', {
            class: 'position-relative border rounded p-2',
            style: 'max-width: 150px;'
        });

        const image = $('<img>', {
            src: fileURL,
            class: 'img-fluid rounded',
            style: 'max-height: 100px;'
        });

        const closeButton = $('<span>', {
            class: 'position-absolute top-0 start-0 bg-danger text-white px-1',
            style: 'cursor: pointer; z-index: 10;',
            html: '&times;'
        }).on('click', function () {
            // Seçilen dosyayı input'tan kaldırmak mümkün olmadığından sadece görseli gizleyeceğiz.
            imageWrapper.remove();
        });

        imageWrapper.append(closeButton).append(image);
        previewContainer.append(imageWrapper);
    });
});
