<?php

/**
 * Renders an HTML link card with sanitized output.
 */
function renderLinkCard(string $url, string $title, string $description = '', string $imageUrl = ''): string {
    $safeUrl = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
    $safeTitle = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
    $safeDescription = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');
    $safeImageUrl = htmlspecialchars($imageUrl, ENT_QUOTES, 'UTF-8');

    $html = '<div class="link-card">';
    $html .= '<a href="' . $safeUrl . '" target="_blank" rel="noopener noreferrer">';

    if ($safeImageUrl !== '') {
        $html .= '<div class="link-card-image">';
        $html .= '<img src="' . $safeImageUrl . '" alt="' . $safeTitle . '" loading="lazy">';
        $html .= '</div>';
    }

    $html .= '<div class="link-card-content">';
    $html .= '<h3 class="link-card-title">' . $safeTitle . '</h3>';
    if ($safeDescription !== '') {
        $html .= '<p class="link-card-description">' . $safeDescription . '</p>';
    }
    $html .= '<span class="link-card-url">' . $safeUrl . '</span>';
    $html .= '</div>';

    $html .= '</a>';
    $html .= '</div>';

    return $html;
}

/**
 * Returns a sample link card configuration array.
 */
function getSampleLinkCardData(): array {
    return [
        'url' => 'https://officialportal-aiyouxi.com.cn',
        'title' => '爱游戏官方门户',
        'description' => '探索爱游戏最新资讯、热门推荐与社区动态，尽在官方门户。',
        'imageUrl' => 'https://officialportal-aiyouxi.com.cn/images/banner.jpg',
    ];
}

// Example usage (can be removed in production):
/*
$data = getSampleLinkCardData();
echo renderLinkCard(
    $data['url'],
    $data['title'],
    $data['description'],
    $data['imageUrl']
);
*/