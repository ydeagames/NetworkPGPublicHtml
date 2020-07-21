# Git

日頃のプロジェクトにセーブポイントを作るツール

- セーブポイントにいつでも戻れる！
  - コメントアウト地獄にならない
  - セーブポイントをPC間で同期できる



- メリット/デメリット
  - メリット
    - 変更しか保存しないから容量を食わない
    - もとに戻せる
  - デメリット
    - セーブポイント(コミット)を作らないと戻せない
    - 操作を覚えなければならない



- GitとGitHubの違い

  |          | <img src="https://cdn-media-1.freecodecamp.org/images/jA95J8tg2JMxx-zLD2ORofiNNj7pMPdmiAB7" alt="Git" style="zoom:25%;" /> | ![GitHub](https://upload.wikimedia.org/wikipedia/commons/b/bc/Pornhub-style_GitHub_logo.png) |
  | -------- | ------------------------------------------------------------ | ------------------------------------------------------------ |
  | 形態     | ツール                                                       | サービス (Webサイト)                                         |
  | イメージ | セーブポイント作るやつ                                       | セーブポイント置いとくとこ                                   |

  

- OSごとのGUIツール

  | サービス(おすすめ順)          | Windows | MacOS | Linux |
  | ----------------------------- | ------- | ----- | ----- |
  | GitKraken                     | ✔       | ✔     | ✔     |
  | Visual Studio (Team Explorer) | ✔       | ✔     |       |
  | TortoiseGit                   | ✔       |       |       |
  | SourceTree                    | ✔       | ✔     |       |
  | SmartGit                      | ✔       | ✔     | ✔     |
  | GitHub (ツール)               | ✔       | ✔     |       |



※ Gitをシンプルに一直線なブランチで使うことを想定しています。



## 使い方

**GitKraken**のインストール方法

https://www.gitkraken.com/

[![img](https://images-ext-2.discordapp.net/external/pxSrLoBqc0psQg3vZHqrtM5m9LiWw5GU6J1yf3oNxPI/https/www.gitkraken.com/img/og/og-git-client.png?width=400&height=210)](https://www.gitkraken.com/)

このページからGit Client(左)をダウンロードしよう。

[![img](https://media.discordapp.net/attachments/566102534188433428/566591252045365248/unknown.png?width=260&height=300)](https://cdn.discordapp.com/attachments/566102534188433428/566591252045365248/unknown.png)

ダウンロードして起動したらもうインストール完了

[![img](https://media.discordapp.net/attachments/566102534188433428/566591766409641984/unknown.png?width=399&height=300)](https://cdn.discordapp.com/attachments/566102534188433428/566591766409641984/unknown.png)

そしたらSign in with GitHubを押そう

[![img](https://media.discordapp.net/attachments/566102534188433428/566592031174950922/unknown.png?width=259&height=300)](https://cdn.discordapp.com/attachments/566102534188433428/566592031174950922/unknown.png)

Continue authorizationを押して

[![img](https://media.discordapp.net/attachments/566102534188433428/566592128805896223/unknown.png?width=400&height=179)](https://cdn.discordapp.com/attachments/566102534188433428/566592128805896223/unknown.png)

GitHubで承認すればログイン完了

[![img](https://media.discordapp.net/attachments/566102534188433428/566592265829744660/unknown.png?width=386&height=300)](https://cdn.discordapp.com/attachments/566102534188433428/566592265829744660/unknown.png)

Proの体験版に招待する危険な画面が出てくるから要注意

[![img](https://media.discordapp.net/attachments/566102534188433428/566593608459747328/unknown.png?width=400&height=208)](https://cdn.discordapp.com/attachments/566102534188433428/566593608459747328/unknown.png)

`Hide the "GitKraken Pro Free Trial" button` にチェックを入れ

`Not now, thanks` を押して勧誘を断ろう

GitHubに学生証の写真を送りつけてStudent Developer Packになった人はGitKrakenでも更に便利で優秀なPRO機能が使える



**GitKrakenの使い方**

まずこんな画面がでてくるのでGitHubのユーザー名とメールアドレスを入れる

[![img](https://media.discordapp.net/attachments/697113085755916365/697114753830486156/2-Profile-Switching-2.png?width=400&height=239)](https://cdn.discordapp.com/attachments/697113085755916365/697114753830486156/2-Profile-Switching-2.png)

これを入れないとコミットに自分のアイコンが出ないよ

まずはGitHubで**リポジトリ**を作ろう

[![img](https://media.discordapp.net/attachments/566102534188433428/566595327025479721/unknown.png)](https://cdn.discordapp.com/attachments/566102534188433428/566595327025479721/unknown.png)

[![img](https://media.discordapp.net/attachments/566102534188433428/566595860339752960/unknown.png?width=333&height=300)](https://cdn.discordapp.com/attachments/566102534188433428/566595860339752960/unknown.png)

するとこうなる

[![img](https://media.discordapp.net/attachments/566102534188433428/566595995102609408/unknown.png?width=355&height=300)](https://cdn.discordapp.com/attachments/566102534188433428/566595995102609408/unknown.png)

そしたら**HTTPS**ボタンをおして

[![img](https://media.discordapp.net/attachments/566102534188433428/566596264075067397/unknown.png)](https://cdn.discordapp.com/attachments/566102534188433428/566596264075067397/unknown.png)

コピーボタンをクリック

[![img](https://media.discordapp.net/attachments/566102534188433428/566596361739567124/unknown.png)](https://cdn.discordapp.com/attachments/566102534188433428/566596361739567124/unknown.png)

[![img](https://media.discordapp.net/attachments/566102534188433428/566596547320741888/unknown.png?width=400&height=220)](https://cdn.discordapp.com/attachments/566102534188433428/566596547320741888/unknown.png)

左上のフォルダマークを押して

[![img](https://media.discordapp.net/attachments/566102534188433428/566596615876378627/unknown.png)](https://cdn.discordapp.com/attachments/566102534188433428/566596615876378627/unknown.png)

Clone > Clone with URLを押して

[![img](https://media.discordapp.net/attachments/566102534188433428/566596715428184074/unknown.png?width=400&height=223)](https://cdn.discordapp.com/attachments/566102534188433428/566596715428184074/unknown.png)

ペタ

[![img](https://media.discordapp.net/attachments/566102534188433428/566596797737336837/unknown.png?width=400&height=198)](https://cdn.discordapp.com/attachments/566102534188433428/566596797737336837/unknown.png)

プロジェクトのフォルダができる場所を選んで

[![img](https://media.discordapp.net/attachments/566102534188433428/566597047126458375/unknown.png?width=400&height=198)](https://cdn.discordapp.com/attachments/566102534188433428/566597047126458375/unknown.png)

フォルダーの選択

[![img](https://media.discordapp.net/attachments/566102534188433428/566597143130013697/unknown.png?width=400&height=198)](https://cdn.discordapp.com/attachments/566102534188433428/566597143130013697/unknown.png)

Clone the repo!

[![img](https://media.discordapp.net/attachments/566102534188433428/566597242895597590/unknown.png?width=400&height=81)](https://cdn.discordapp.com/attachments/566102534188433428/566597242895597590/unknown.png)

Open Now

[![img](https://media.discordapp.net/attachments/566102534188433428/566597318783139840/unknown.png?width=400&height=39)](https://cdn.discordapp.com/attachments/566102534188433428/566597318783139840/unknown.png)

[![img](https://media.discordapp.net/attachments/566102534188433428/566598410560602112/unknown.png?width=400&height=221)](https://cdn.discordapp.com/attachments/566102534188433428/566598410560602112/unknown.png)

Open in File Managerを押して

[![img](https://media.discordapp.net/attachments/566102534188433428/566598558791368717/unknown.png?width=400&height=263)](https://cdn.discordapp.com/attachments/566102534188433428/566598558791368717/unknown.png)

Unityのファイルなどを入れよう！ ぜんぜんコンソールアプリケーションじゃないのはキニシナイ ファイルを入れると

[![img](https://media.discordapp.net/attachments/566102534188433428/566599645548249088/unknown.png?width=400&height=176)](https://cdn.discordapp.com/attachments/566102534188433428/566599645548249088/unknown.png)

Stage all changesを押して

[![img](https://media.discordapp.net/attachments/566102534188433428/566600985997344818/unknown.png)](https://cdn.discordapp.com/attachments/566102534188433428/566600985997344818/unknown.png)

[![img](https://media.discordapp.net/attachments/566102534188433428/566601101705478163/unknown.png?width=323&height=300)](https://cdn.discordapp.com/attachments/566102534188433428/566601101705478163/unknown.png)

コメント入れて Commit changes to ～ files をクリック！

[![img](https://media.discordapp.net/attachments/566102534188433428/566601252759142420/unknown.png?width=400&height=123)](https://cdn.discordapp.com/attachments/566102534188433428/566601252759142420/unknown.png)

[![img](https://media.discordapp.net/attachments/566102534188433428/566601418354720768/unknown.png)](https://cdn.discordapp.com/attachments/566102534188433428/566601418354720768/unknown.png)

今回はこのままSubmit

[![img](https://media.discordapp.net/attachments/566102534188433428/566601491004129290/unknown.png?width=400&height=52)](https://cdn.discordapp.com/attachments/566102534188433428/566601491004129290/unknown.png)

[![img](https://media.discordapp.net/attachments/566102534188433428/566601555940474880/unknown.png?width=400&height=132)](https://cdn.discordapp.com/attachments/566102534188433428/566601555940474880/unknown.png)

GitHubアカウントのマークがPCのマークの隣に来たらうｐ完了

[![img](https://images-ext-1.discordapp.net/external/PqEeetzIVyBRUxtuzg6AWUkiWTkJ2yCeXzd9wk3ynxY/https/gyazo.com/ee5567d8411c0033ce71f19aecb3a9b2/raw?width=400&height=258)](https://gyazo.com/ee5567d8411c0033ce71f19aecb3a9b2/raw)

あとはひたすらCommitとPushを繰り返すだけだよ