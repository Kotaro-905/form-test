<!-- モーダルHTML -->
<div id="detail-modal" class="modal">
    <div class="modal-content">
        <span class="modal-close">&times;</span>

        <div class="detail-row"><strong>お名前</strong><span id="detail-name"></span></div>
        <div class="detail-row"><strong>性別</strong><span id="detail-gender"></span></div>
        <div class="detail-row"><strong>メールアドレス</strong><span id="detail-email"></span></div>
        <div class="detail-row"><strong>電話番号</strong><span id="detail-tel"></span></div>
        <div class="detail-row"><strong>住所</strong><span id="detail-address"></span></div>
        <div class="detail-row"><strong>建物名</strong><span id="detail-building"></span></div>
        <div class="detail-row"><strong>お問い合わせの種類</strong><span id="detail-category"></span></div>
        <div class="detail-row"><strong>お問い合わせ内容</strong><span id="detail-content"></span></div>

        <form method="POST" id="delete-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-btn">削除</button>
        </form>
    </div>
</div>

<!-- JavaScript for modal -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('detail-modal');
        const closeBtn = modal.querySelector('.modal-close');

        document.querySelectorAll('.detail-button').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.dataset.id;
                fetch(`/admin/contacts/${id}`)
                    .then(res => res.json())
                    .then(data => {
                        document.getElementById('detail-name').textContent = data.contact.first_name + '　' + data.contact.last_name;
                        document.getElementById('detail-gender').textContent = data.gender_label;
                        document.getElementById('detail-email').textContent = data.contact.email;
                        document.getElementById('detail-tel').textContent = data.contact.tel;
                        document.getElementById('detail-address').textContent = data.contact.address;
                        document.getElementById('detail-building').textContent = data.contact.building || '（未入力）';
                        document.getElementById('detail-category').textContent = data.category_content;
                        document.getElementById('detail-content').textContent = data.contact.content;

                        document.getElementById('delete-form').action = `/admin/contacts/${id}`;

                        modal.style.display = 'flex';
                    });
            });
        });

        closeBtn.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    });
</script>