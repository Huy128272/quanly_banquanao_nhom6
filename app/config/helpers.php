<?php
// Hàm in an toàn ra HTML (chống XSS)
function h($giaTri) {
    return htmlspecialchars((string)$giaTri, ENT_QUOTES, 'UTF-8');
}
