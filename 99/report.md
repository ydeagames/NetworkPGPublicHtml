# CSS3新機能

## **CSS3で追加された機能**

- `box-sizing` でボーダーを高さに含めるかどうかを設定できます
- `border-radius` で角を丸くできます
- `box-shadow` や `text-shadow` で影がつけられます
- `transform` で回転やリサイズ、傾斜変形(skew)などできます

    ![CSS3%20cc62b99409a74134b9d17fa8501b4b04/Untitled.png](CSS3%20cc62b99409a74134b9d17fa8501b4b04/Untitled.png)

- アニメーション機能充実

    ![https://i.gyazo.com/c36eb1ec6f7b5de6d5c5c779651d69fa.gif](https://i.gyazo.com/c36eb1ec6f7b5de6d5c5c779651d69fa.gif)

- セレクタが充実
    - 疑似クラス`:nth-child` n番目の要素を取得
    - 疑似要素 `::before` `::after` 前後に要素を追加
    - `:not()` で反転
- Webフォントでカスタムフォント

    ![CSS3%20cc62b99409a74134b9d17fa8501b4b04/Untitled%201.png](CSS3%20cc62b99409a74134b9d17fa8501b4b04/Untitled%201.png)

- 簡単に段組が作れる `column-count`, `column-width`
- 柔軟な `flex` レイアウト

## **column-count, column-width**

マルチカラムレイアウトというやつ

ひとつのボックスで複数の段組みを作るレイアウトをマルチカラムレイアウトと言う

[column系](https://www.notion.so/5483baa1189d4c8f97faaad23e58955b)

## **Bulmaについて**

CSSフレームワークっていうやつの一種

既製品のCSSを使うことで、HTMLをいじるだけでイカスなページを作ることができる。

公式ドキュメントが分かりやすい

[Documentation](https://bulma.io/documentation/)

### **グリッドシステムレイアウト**

親要素となるブロックに「columns」クラスをつけ、子要素となるブロックに「column」クラスをつけると、たったこれだけで、カラムレイアウトを構築することが出来ます。

コード

```html
<div class="columns">
  <div class="column">
    First column
  </div>
  <div class="column">
    Second column
  </div>
  <div class="column">
    Third column
  </div>
  <div class="column">
    Fourth column
  </div>
</div>
```

結果

![https://tonyo.design/static/7496f82d3bb21a1e77d088aa06f70fe1/fcda8/1.png](https://tonyo.design/static/7496f82d3bb21a1e77d088aa06f70fe1/fcda8/1.png)

- [Bootstrap](https://getbootstrap.com/)

    最も有名？Webアプリケーションフレームワークとも呼ばれている。jQuery及び独自のjsが組み込み済み。

- [Foundation](https://foundation.zurb.com/)

    Bootstrapより柔軟性がある？？

- [Materialize](https://materializecss.com/)

    [マテリアルデザイン](https://ja.wikipedia.org/wiki/%E3%83%9E%E3%83%86%E3%83%AA%E3%82%A2%E3%83%AB%E3%83%87%E3%82%B6%E3%82%A4%E3%83%B3)を志向したフレームワーク。独自のjsが組み込み済み。

- [Semantic UI](https://semantic-ui.com/)

    「[セマンティック・ウェブ](https://ja.wikipedia.org/wiki/%E3%82%BB%E3%83%9E%E3%83%B3%E3%83%86%E3%82%A3%E3%83%83%E3%82%AF%E3%83%BB%E3%82%A6%E3%82%A7%E3%83%96)」を志向したフレームワーク。独自のjsが組み込み済み。

- [Pure.CSS](https://purecss.io/)

    シンプルさを志向したFW。組み込みのJavaScriptは無し。

- [BULMA](https://bulma.io/)

    CSSのみでのフレキシブルデザイン(Flexbox)に対応したフレームワーク。組み込みのJavaScript無し。