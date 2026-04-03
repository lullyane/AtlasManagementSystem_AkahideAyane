$(function () {
  // スクール予約確認とスクール枠登録の項目を講師アカウントにのみ表示させる
  const adminLinks = document.querySelectorAll('a[href*="admin"]');

  adminLinks.forEach(Link => {
    const p = Link.closest('p');
    const url = new URL(Link.href);
    const role = Number(url.searchParams.get('role'));
    if (![1, 2, 3].includes(role)) {
      p.style.display = 'none';
    }
  })
});
