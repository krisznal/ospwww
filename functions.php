<?php

function renderMenu($parentId, $menu) {
    if (!isset($menu[$parentId])) return;

    echo '<ul class="' . ($parentId === null ? 'nav-center' : 'dropdown') . '">';
    foreach ($menu[$parentId] as $item) {
        echo '<li>';
        echo '<a href="' . htmlspecialchars($item['url']) . '">' . htmlspecialchars($item['label']) . '</a>';
        renderMenu($item['id'], $menu);
        echo '</li>';
    }
    echo '</ul>';
}