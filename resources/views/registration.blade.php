<!DOCTYPE html>
<html lang="en" translate="no" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneLook</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .active {
            text-decoration: underline;
            text-decoration-color: #ff9011;
            text-underline-offset: 4px;
            text-decoration-thickness: 2px;
        }

    </style>
</head>

<body class="justify-center items-center bg-theme-white text-theme-black font-['Calibri']">

    <!--header-->
    <header class="flex shadow bg-sky-700 justify-between items-center py-5 px-5 h-11 text-base tracking-widest fixed w-full z-50"
    id="header_frame">

        <div class="justify-center items-center">
            <a href="{{route('home')}}" class="font-semibold text-theme-white">OneLook</a>
        </div>

        <!--<div class="flex justify-center items-center gap-5 py-6 text-sm">
            <div class="font-semibold text-theme-white hover:text-yellow-300">
                <a href="{{route('login')}}">ログイン</a>
            </div>
            <div class="font-semibold px-2 py-1 rounded-sm bg-theme-yellow text-theme-black hover:bg-yellow-400 hover:text-theme-white">
                <a href="{{route('registration')}}">無料会員登録</a>
            </div>
        </div>-->

    </header>
    <!--header ends here-->

    <!--content-->
    <div class="flex justify-center items-center pt-20">
        <div class="flex justify-center items-center w-11/12 sm:w-9/12 md:w-7/12 lg:w-5/12 xl:w-4/12 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-3xl h-full md:h-auto">
                <!--modal content-->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!--modal header-->
                    <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-bold text-sky-600 dark:text-white">
                            無料会員登録
                        </h3>

                    </div>
                    <!--modal body-->
                    <div class="px-8 py-4 space-y-4">
                        <form action="{{route('register')}}" method="POST">
                            @csrf
                            <div class="relative z-0 w-full mb-4 group">
                                <input type="text" name="full_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="full_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">氏名</label>
                            </div>
                            <div class="relative z-0 w-full mb-4 group">
                                <input type="email" name="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">メールアドレス</label>
                            </div>
                            <div class="relative z-0 w-full mb-4 group">
                                <input type="text" name="company_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="company_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">会社名（任意）</label>
                            </div>
                            <!--<div class="relative z-0 w-full mb-4 group">
                                <input type="text" name="phone_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="phone_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">電話番号</label>
                            </div>
                            <div class="grid xl:grid-cols-2 xl:gap-6">
                                <div class="relative z-0 w-full mb-4 group">
                                    <input type="text" name="username" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                    <label for="username" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ユーザー名</label>
                                </div>
                                <div class="relative z-0 w-full mb-4 group">
                                    <input type="email" name="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                    <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">メールアドレス</label>
                                </div>
                            </div>
                            <div class="grid xl:grid-cols-2 xl:gap-6">
                                <div class="relative z-0 w-full mb-4 group">
                                    <input type="password" name="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                    <label for="password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">パスワード</label>
                                </div>
                                <div class="relative z-0 w-full mb-4 group">
                                    <input type="password" name="password_confirmation" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                    <label for="password_confirmation" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">パスワードを認証する</label>
                                </div>
                            </div>-->
                            <div class="relative z-0 w-full mb-4 group">
                                <x-jet-validation-errors class="mb-4" />
                            </div>

                            <div class="flex flex-col items-center py-6 gap-2 w-full">
                                <button type="submit" class="text-white bg-sky-600 hover:bg-sky-400 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-600 dark:focus:ring-blue-400 w-full">登録</button>
                            </div>

                    </div>
                    <!--modal footer-->
                    <div class="flex flex-row justify-end items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600 gap-6">
                        <div class="flex flex-row justify-between md:px-4 text-sm w-full">
                            <div class="flex flex-row items-center gap-2">
                                <input type="checkbox" name="accept" id="accept-radio" class="focus:ring-0">
                                <button type="button" class="text-sky-600 hover:text-sky-400 underline underline-offset-2" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable">利用規約</button>
                                <span>に同意して進む</span>
                            </div>

                            <div class="flex flex-row">
                                <span>すでに登録？</span>
                                
                                <a href="{{route('login')}}" class="text-sky-600 hover:text-sky-400 underline underline-offset-2">ログインする</a>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!--terms and conditions modal-->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
    id="exampleModalScrollable" tabindex="-1" aria-labelledby="exampleModalScrollableLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">利用規約</h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-neutral-600 hover:text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="modal-body relative p-4">
                    <p>利用規約<br>
                    第1条（用語の定義）<br>
                    本利用規約における主な用語の定義は、次の各号に掲げるとおりとします。<br>
                    「OneLook（以下「本サービス」といいます。）」とは、株式会社モアジョブがインターネット上で提供するクラウド型動画作成及び動画共有サービスのことをいいます。<br><br>

                    「本ソフトウェア」とは、本サービスの一部の機能を利用するためにダウンロードすることが必要になるソフトウェアのことをいいます。なお、特に指定のない限り、本サービスとは、本ソフトウェアを含むものとします。<br><br>

                    「本サイト」とは、本サービスに関して当社が運営するウェブサイトのことをいいます。<br><br>

                    「利用契約」とは、当社から本サービスの提供を受けるための契約をいいます。<br><br>

                    「契約者」とは、本利用規約に基づく利用契約を当社と契約している方をいいます。<br><br>

                    「フリープラン」とは、契約者（ユーザー）が、無料で、本サービスを利用する利用形態のことをいいます。<br><br>

                    「パーソナルプラン」とは、契約者（ユーザー）が、月額利用料金を支払って、本サービスを利用する利用形態のことをいいます。<br><br>

                    「ビジネスプラン」とは、フリープラン及びパーソナルプラン以外で、契約者（ユーザー）が、別途の契約を行い、本サービスを利用する利用形態のことをいいます。<br><br>

                    「閲覧者」とは本利用規約に基づきプランの契約者が本サービスの利用を認めた第三者をいいます。なお、閲覧者は本契約者の事業のために本サービスを利用されているものとみなします。<br><br>

                    以下では、全ての「契約者」及び「閲覧者」を総称して「お客様」といいます。<br><br>

                    「ライセンス」とは、ビジネスプラン利用者として登録可能な資格をいいます。<br><br>

                    第2条（規約の適用および変更）<br>
                    本利用規約は、全てのお客様に適用されます。本利用規約に同意いただけない場合、本サービスを利用することはできません。<br><br>

                    本サイト上で、本サービスに関するその他の規定（以下「その他の規定」といいます。）が存在する場合に、その他の規定は、本利用規約の一部を構成するものとします。本利用規約の規定とその他の規定の内容が異なる場合は、本利用規約が優先して適用されます。<br><br>

                    契約者は、自己が共有を認めた閲覧者が本サービスの利用をする際に、本利用規約の内容を説明し遵守させる責任があります。<br><br>

                    当社は、本利用規約をいつでも任意に変更することができ、お客様はこれを承諾するものとします。当社が別途定める場合を除き、本利用規約の変更は、本サイトへの掲載によって随時お客様に発表するものとし、当該掲載をもって効力が生じます。お客様が本利用規約の変更を同意しない場合、お客様の唯一の対処方法は、第19条所定の解約手続きによって契約を終了させることだけです。<br><br>

                    本利用規約が変更された場合、お客様に、変更後の利用規約について承諾を求めることがあります。<br><br>

                    第3条（本サービスの提供）<br>
                    当社は、お客様に対し、本サービスを提供致します。本サービスにおける各プランのサービスの具体的内容は、別途定めるプラン比較ページの内容によります。<br><br>

                    お客様は、自らの責任と費用において、ハードウェア、ソフトウェア、インターネット接続回線、セキュリティの確保等、本サービスの利用に必要な環境（以下「利用環境」といいます。）を整備します。<br><br>

                    第4条（知的財産権等）<br>
                    プログラム、サービス提供画面、本ソフトウェア等、本サービスに関する一切の特許権、実用新案権、意匠権、商標権、著作権、不正競争防止法上の権利、その他一切の財産的若しくは人格的権利（以下「知的財産権等」といいます。）は、全て当社又はそのライセンサーに帰属します。<br><br>

                    お客様は、本サービスの利用契約締結に基づいて、本サービスを利用することができますが、提供される本サービスに関する知的財産権等を取得するものではありません。お客様は、本サービスの一部または全部を、リバースエンジニアリング、逆コンパイル、又は逆アセンブラ、その他本サービスを解析しようと試みてはならないものとします。<br><br>

                    第5条（利用資格）<br>
                    18歳未満の方が本サービスの利用を申込む際には、事前に親権者の同意を得るものとします。<br><br>

                    第6条（契約期間）<br>
                    契約成立と利用開始日について<br>
                    本サービス利用申込をいただき、当社からオンラインの会員専用画面において本サービス利用開始日を表示することをもって、当社が申込を受諾したものとし、利用契約の成立となります。<br><br>

                    フリープランの契約期間<br>
                    フリープランには、契約期間の定めはありません。<br><br>

                    月間契約のパーソナルプランの契約期間<br>
                    月間契約のパーソナルプランの契約期間は１月（申込時は、申込日から申込日の翌月末日までの期間とします。）とします。<br><br>

                    年間契約のパーソナルプランの契約期間<br>
                    年間契約のパーソナルプランの契約期間は12カ月（申込時は、申込日から申込日の翌月以後12カ月）とします。<br><br>

                    ビジネスプランの契約期間<br>
                    ビジネスプランの契約期間は、別途契約によって定められるものとします。<br><br>

                    契約の自動更新<br>
                    パーソナルプランの契約者から当社に対し、契約期間満了日までに、第8条の解約手続きによって契約を終了させる旨の申し出がなされない限り、月間契約の場合は翌１月または年間契約の場合は翌12カ月自動更新されるものとし、その後も同様とします。<br><br>

                    基準時間<br>
                    本利用規約にて定める日時は、全て日本時間を基準とします。<br><br>

                    第7条（プランの変更）<br>
                    以下の各号に該当する契約者は、当社に対し、各号記載のとおり、プラン変更を申し込むことができます。<br><br>

                    1）フリープランの契約者<br>
                    月間契約または年間契約のパーソナルプラン又はビジネスプランへのプラン変更を申し込むことができます。<br><br>

                    2）パーソナルプランの契約者<br>
                    パーソナルプランを解約することにより、フリープランへの変更することができます。<br>
                    ビジネスプランへのプラン変更を申し込むことができます。<br><br>

                    3）ビジネスプランの契約者<br>
                    別途契約によって定められるものとします。<br><br>

                    第8条（パーソナルプランへの変更及び解約）<br>
                    1)パーソナルプランへの変更<br>
                    パーソナルプランへの変更申込以後は、ホームページに定めるプランにしたがってパーソナルプランの機能のご利用が可能となります。<br><br>

                    2)パーソナルプランの申し込み<br>
                    パーソナルプランへの変更申込日の翌月1日または契約更新された月の１日において、パーソナルプランの月間料金が課金されます。<br><br>

                    3）月間契約から年間契約への変更<br>
                    パーソナルプランの月間契約を年間契約に切り替える場合には、変更申込日の翌月1日に、パーソナルプランの年間料金が課金されます。なお、この場合には月間契約は年間契約の申込月の末日をもって解約されたものとみなします。<br><br>

                    4)パーソナルプランの解約<br>
                    パーソナルプランの解約申請があった場合には、申請受付時をもってパーソナルプランは解約され、受付以後はパーソナルプランの機能のご利用はできなくなります。<br>
                    契約解約の場合には、解約受付日の翌日以後の課金は発生しませんが、既にお支払いいただいた利用料金がある場合でも当社から契約者への返金は致しません。<br>
                    なお、パーソナルプランの解約申請は、パーソナルプランへの変更申込日の翌月2日以後でなければ申請できないものとします。<br><br>

                    第9条（本サービスの範囲及び条件）<br>
                    フリープラン及びパーソナルプランの会員に対する本サービスの範囲及び条件は、ホームページに定めるプラン比較ページの内容に従うものとします。<br>
                    ビジネスプランの本サービスの範囲及び条件は、別途契約によって定められるものとします。<br><br>

                    第10条（認証・パスワード管理等）<br>
                    本サービスを利用するにあたっては、メールアドレス及びパスワードの登録が必要となります。<br><br>

                    お客様は、登録したメールアドレス及びパスワードを厳重に管理するものとし、第三者に知られないようにしなければなりません。第三者にパスワードを知られたと感じる場合には、直ちにパスワードを変更するものとします。<br><br>

                    当社は、お客様が登録したメールアドレス及びパスワードの入力によりログインされ、本サービスが利用されているときは、当該メールアドレス及びパスワードを登録したお客様ご本人が本サービスを利用しているものとみなします。<br><br>

                    第11条（利用料金）<br>
                    本サービスの利用にあたり、契約者は、以下各号に定めるところに従い、利用料金を支払うものとします。<br><br>

                    1）パーソナルプランの利用料金<br>
                    パーソナルプランの利用料金は、毎月初日においてパーソナルプランを契約している契約者に対して請求します。本サービスの利用料金は、ホームページに定めるプラン比較ページの内容に従うものとします。<br><br>

                    2）ビジネスプランの利用料金<br>
                    別途契約によって定められるものとします。<br><br>

                    3）お支払方法<br>
                    クレジットカード決済又は当社が別途定める方法（以下単に「クレジットカード決済等」といいます。）のみご利用できます。<br><br>

                    4）利用料金の発生<br>
                    パーソナルプランの利用開始申込日の翌月から利用料金が発生します。なお、契約更新時は決済処理が完了した日ではなく、契約更新日より料金が発生します。契約更新は第6条に従って、適用されます。<br><br>

                    5）お支払日<br>
                    お支払日は、各クレジット会社会員規約に基づく引き落とし日となります。<br><br>

                    料金支払いについてのご注意<br>
                    契約期間中の利用の有無にかかわらず、契約期間内の利用料金全額を支払うものとします。既にお支払いいただいた利用料金がある場合でも当社から契約者への返金は致しません。<br>
                    また、クレジットカード会社、収納代行会社の設定がある場合には、それらに規定する契約条件にしたがうものとします。<br><br>

                    料金の改訂について<br>
                    当社は、契約者の承諾無く料金額を改定または部分的変更を行うことができるものとし、契約者は、改定後の料金を当社指定の方法で支払うものとします。<br><br>

                    お支払いの遅延について<br>
                    弊社指定の支払い方法にて利用料金の決済処理ができなかった場合、第17条や第23条に従い、サービスの停止又は解除の手続を取る場合があります。契約者は、当社の請求により、当社の指定する方法にて直ちに未支払い分及び年14．6％の割合による遅延損害金をお支払いいただきます。<br><br>

                    第12条（届出事項の変更）<br>
                    お客様は、本サービスお申し込み時に当社へ届け出た事項に変更が生じた場合、当社所定のオンライン上の方法を通じて、変更内容をすみやかに届け出るものとします。<br><br>

                    第13条（連絡について）<br>
                    当社からお客様への連絡は、書面の送付、メールの送信、または本サイトへの掲載等、当社が適当と判断する通信手段によって行います。当該連絡が、メールの送信又は本サイトへの掲載によって行われる場合は、インターネット上に配信された時点でお客様に到達したものとします。<br><br>

                    お客様から当社への連絡は、本サイト上のメールフォームからのメールの送信、又はサポートページからのチャットの送信にて行うものとします。当社は、上記以外の手段からの連絡については、対応しないものとします。<br><br>

                    第14条（個人情報の取り扱いに関して）<br>
                    当社は、お客様の個人情報を、プライバシーポリシーに基づき、適切に取り扱います。<br><br>

                    第15条（本サービス内容の変更）<br>
                    当社は、お客様への事前の通知なくして、本サービス各プランの諸条件、価格、本サービスの部分的な改廃など、本サービスの内容を変更することがあり、お客様は、これを承諾するものとします。<br><br>

                    第16条（サービスの中断）<br>
                    当社は以下の各号の一に該当する場合には、お客様に事前に連絡することなく、一時的にサービスの提供を中断する場合があります。お客様は、このことを了解の上ご利用ください。<br><br>

                    本サービスのシステムの保守を定期的に、または緊急に行う場合<br>
                    火災、停電、事故などにより本サービスの提供ができなくなった場合<br>
                    地震、噴火、洪水、津波などの天災により本サービスの提供ができなくなった場合<br>
                    戦争、変乱、暴動、騒乱、労働争議などにより本サービスの提供ができなくなった場合<br>
                    予想外の技術的問題その他、運用上、技術上、当社が本サービスの一時的な中断を必要と判断した場合<br><br>

                    第17条（お客様の都合によるサービスの停止）<br>
                    当社は、お客様に、以下各号に定める停止事由が存する場合、各号に定める再開事由が生じるまでの間、サービスの提供を停止することがあります。<br><br>

                    （停止事由）<br>
                    弊社指定の支払方法にて利用料金の決済処理ができないこと<br>
                    （再開事由）<br>
                    未払料金全額の入金が確認されること<br>
                    （停止事由）<br>
                    未払料金が発生し、かつ、当社から契約者に連絡が取れないこと<br>
                    （再開事由）<br>
                    契約者に連絡がとれ、かつ、未払料金全額の入金が確認されたこと<br>
                    （停止事由）<br>
                    当社からお客様に連絡を取る必要がある場合において、お客様に連絡がとれないこと<br>
                    （再開事由）<br>
                    当該お客様に連絡が取れること<br>
                    （停止事由）<br>
                    第22条に違反した場合において、違反状態が是正されないこと<br>
                    （再開事由）<br>
                    第22条の違反状態が是正されたこと<br><br>

                    第18条（本サービスの廃止）<br>
                    当社は、やむをえない事由が発生した場合には、本サービスの契約を終了させ、または本サービスの提供を廃止することがあります。<br><br>

                    本サービスを廃止する場合には、あらかじめ、ウェブサイトにおける告知その他適宜の方法によりお客様に通知致します。ただし、緊急その他やむをえない事情がある場合はこの限りでありません。<br><br>

                    第19条（契約者による本サービスの利用契約の解約）<br>
                    1)フリープランの契約者<br>
                    フリープランの契約者は、当社所定のオンライン上の解約ページにより解約を申し出ることにより、いつでも、本サービスの利用契約を解約できるものとします。解約日は、解約の申し込みが当社に到達した日とし、解約が完了した場合には、オンライン上の解約完了画面においてその旨表示するとともに、契約者が届け出たメールアドレス宛に通知を致します。<br><br>

                    2）パーソナルプランの契約者<br>
                    パーソナルプランの契約者は、当該パーソナルプランの解約後でなければ、本サービスの利用契約を解約できません。パーソナルプランの解約後、前項に従い、本サービスの解約をすることができます。<br><br>

                    3）ビジネスプランの契約者<br>
                    ビジネスプランの契約者は、別途契約に従って、解約できるものとします。<br><br>

                    本サービスの契約解約をした場合、すべてのデータおよび情報は、申込時に本サーバーから削除されます。なお、解約日以後は本サービスの機能のご利用はできなくなります。<br><br>

                    第20条（返金・キャンセル）<br>
                    契約者は、第19条（契約者による解約）の場合を除き、契約締結後の申込みの撤回（キャンセル）はできません。<br><br>

                    前項の規定にかかわらず、当社が契約者の申込内容と異なるサービスをお客様に提供した場合、契約者は、電子メールまたは当社が提供する手段を通じて当社へ連絡し、申し込みの撤回・キャンセルをすることができます。<br><br>

                    前項の規定によりキャンセルがされた場合、当社は、銀行振込またはクレジットカード決済の取り消しにより、返金致します。<br><br>

                    第21条（譲渡禁止）<br>
                    当社は、お客様に対する債権を第三者に譲渡できるものとし、お客様は、そのためにお客様の個人情報等が当該第三者に提供されることを承諾するものとします。<br><br>

                    お客様は、当社の事前の書面による承諾なく、本契約上の地位又は本サービスに基づく権利義務につき、第三者に対し、譲渡、移転、担保設定、その他の処分をすることはできないこととします。ただし、当社が本サービスの内容として具体的に定めている場合は、この限りでありません。<br>

                    第22条（禁止事項）<br>
                    お客様は、本サービスの利用に際して、故意または過失の有無にかかわらず、自ら、又は第三者を利用して、以下各号に該当する行為を行ってはならないものとします。<br><br>

                    承諾を得ることなく他人の著作物やその複製物を送信する行為、他人のプライバシーや企業秘密に属する事項を送信する行為など、当社もしくは第三者の著作権、商標権等の知的財産権、財産、プライバシーもしくは肖像権を侵害する行為、又はそのおそれのある行為。<br><br>

                    当社、もしくは第三者に不利益又は損害を与える行為、又はそのおそれのある行為。<br><br>

                    第三者の人権を侵害する行為ないし公序良俗に反する行為、又はそのおそれのある行為。<br><br>

                    詐欺・脅迫など犯罪実行の手段や、犯罪の教唆・扇動のために本サービスを利用するなど、犯罪的行為もしくは犯罪的行為に結びつく行為、又はそのおそれのある行為。<br><br>

                    極度に当社サーバに極度の負荷をかけるような態様で本サービスを使用するなど、当社もしくは本サービスの運営を妨げる行為、又はそのおそれのある行為。<br><br>

                    当社もしくは本サービスの信用を毀損する行為、又はそのおそれのある行為。<br><br>

                    当社に対して虚偽の申告、届出を行う行為。<br><br>

                    本サービスを通じて、又は本サービスに関連してコンピュータウィルス等、有害なプログラムを使用、又は提供する行為、又はそのおそれのある行為。<br><br>

                    法令に違反する行為。<br><br>

                    お客様のものとして登録したメールアドレス及びパスワードを、お客様以外の第三者に入力させて本サービスを利用させる行為。<br><br>

                    当社の事前の書面による同意なく第三者へ本サービス利用契約上の地位を貸与、譲渡する行為。<br><br>

                    本サービスの一部または全部をリバースエンジニアリング、逆コンパイル、又は逆アセンブラ、その他本サービスを解析する行為。<br><br>

                    反社会的勢力等（暴力団、暴力団員、右翼団体、反社会的勢力、その他これに準ずる者を意味します。以下同じ。）の維持、運営若しくは経営に協力若しくは関与する等反社会的勢力等との何らかの交流若しくは関与をする行為。<br><br>

                    契約者と顧問等の契約のない第三者への閲覧者申請その他お客様に迷惑をかける行為。<br><br>

                    ハードウェアまたはソフトウェアの管理を無効にする等、ハードウェアまたはソフトウェアのメーカーが定める利用規約、ガイドライン、その他の規程類で定められた使用条件に違反して改造されたデバイスを使って、本サービスを利用する行為。<br><br>

                    前各号の行為を直接又は間接に惹起し又は容易にする行為。<br><br>

                    当社が公序良俗に反すると判断する行為、又はそのおそれのある行為。<br><br>

                    その他、当社が不適当であると判断する行為。<br><br>

                    第23条（当社による解除）<br>
                    当社は、お客様が、前条各号、その他本利用規約に定める条項に違反した場合においては、契約者の帰責性の有無にかかわらず、あらかじめお客様に通知することなく、即時に当該利用契約を解除することができます。<br><br>

                    前項の規定によって当該利用契約が解除された場合、既に支払われた利用代金は返金致しません。<br><br>

                    第24条（データの閲覧・利用・開示・削除に関する合意事項）<br>
                    当社は、お客様が登録時に入力した情報及び作成した動画などお客様が送信または作成した情報（以下「送信情報」といいます。）について、細心の注意を払い、安全に管理するよう努めます。<br><br>

                    お客様は、送信情報に係る著作権を、送信後も引き続き保有します。当社は、お客様に対する本サービスの提供のために必要な範囲に限って、送信情報を複製、翻案、自動公衆送信及びそのために必要な送信可能化その他の利用を行うことができるものとします。<br><br>

                    第1項に拘らず、本サービスが本質的に情報の喪失、改変、破壊等の危険が内在するインターネット通信網を介したサービスであることに鑑みて、お客様は、送信情報を自らの責任においてバックアップするものとします。期間経過により削除された動画又は当該バックアップを怠ったことによってお客様が被った損害について、当社は、送信情報の復旧を含めて、一切責任を負いません。<br><br>

                    当社は、送信情報の開示及び削除されたデータの復旧対応は行っておらず、また、送信情報の開示及び復旧について、一切責任を負いません。<br>
                    当社は、以下各号の一に該当する場合には、送信情報を閲覧・利用し、または第三者へ開示することがあります。<br><br>

                    1）捜査機関の令状あるとき、裁判所からの調査嘱託等開示の要求があるとき、行政機関から開示要求があるとき<br>
                    2）法律に従い開示の義務を負うとき<br>
                    3）当社が、お客様が第22条に定める禁止事項に該当する行為を行っていると判断したとき<br>
                    4）お客様や第三者の生命・身体・その他重要な権利を保護するために必要なとき<br>
                    5）本サービスのメンテナンスのため緊急の必要があるとき<br>
                    6）上記各号に準じる必要性があるとき<br><br>

                    当社は、以下各号の一に該当する場合には、送信情報について、その一部または全部を削除することがあります。当社は、削除された送信情報について、当該情報の復旧を含めて一切責任を負いません。<br><br>
                    1）契約者の同意を得たとき<br>
                    2）当社が、お客様が第22条各号に該当する禁止行為を行っていると判断したとき<br>
                    3）当該利用契約が、第19条に定める契約者による解約により終了したとき<br>
                    4）当該利用契約が、第23条に定める当社による解除により終了したとき<br>
                    5）第18条によって本サービスが廃止されたとき<br>
                    6）フリープラン契約者が本サービスに1年以上ログインしなかったとき<br>
                    7）上記各号に準じる必要性があるとき<br>

                    第4項及び第5項の定めは、当社が一定の場合に同項に定める措置を実施することを、当社に義務づけるものではありません。上記各措置の実施の有無は、当社の任意の判断によるものとします。<br><br>

                    第19条に定める契約者による解約又は第23条に定める当社による解除により利用契約が終了した閲覧者又はお客様及びビジネスプランの契約者が第1条10号に基づく本サービスの利用の許諾を終了したビジネスプラン利用者（以下、当該お客様及びビジネスプラン利用者を併せて「利用終了者」といいます。）が利用契約期間中に本サービスに送信した送信情報については、以下のとおり削除又は保存されます。<br><br>

                    送信情報は、5日又は７日の保管期限を設けた後に削除されます。<br><br>

                    第25条（本サービス提供のあり方に関する合意事項）<br>
                    当社は、本サービスを、現状有姿の状態で提供します。当社は、次の各号につき、いかなる保証も行うものではありません。さらに、お客様が当社から直接又は間接に、本サービスに関する情報を得た場合であっても、当社は、お客様に対し、本利用規約において規定されている内容を超えて、いかなる保証も行うものではありません。<br><br>

                    1）本サービスの利用に起因して利用環境に不具合や障害が生じないこと<br>
                    2）本サービスの正確性、完全性、永続性、目的適合性、有用性<br>
                    3）お客様に適用のある法令、業界団体の内部規則等への適合性<br>
                    当社は、本サービスを、ＳＳＬ通信による暗号化の下提供致します。お客様は、このセキュリティレベルについて了解するものとします。<br><br>

                    当社は、お客様が本サービスを利用して行うメッセージやアップロードされるファイルについて、一切監視の責任を負いません。<br>

                    第26条（免責事項）<br>
                    お客様のユーザーＩＤ及びパスワードが第三者によって使用されていた場合、お客様が被った損害について、お客様の故意や過失の有無にかかわらず、当社は一切責任を負いません。<br><br>

                    第三者によるクレジットカード不正利用が行われた場合、お客様と、第三者及びクレジットカード会社との間で処理解決するものとし、お客様の故意過失の有無に関わらず、当社は一切責任を負いません。<br><br>

                    お客様とクレジットカード会社、収納代行会社、その他金融機関などの間で紛争が発生した場合は、当該当事者双方で解決するものとし、当社は一切責任を負いません。<br><br>

                    第16条の規定によるサービス中断期間中、お客様が本サービスを利用できなかったことに関する損害、作業が中断したことに関する損害、データが失われたことに関する損害、本サービスを利用することによって得られたであろう利益を得られなかった損害など、本サービスの利用に際して発生した損害については、直接損害・間接損害、現実に発生した損害か否かを問わず、当社は一切の責任を負わないものとし、お客様はこれを承諾するものとします。<br><br>

                    第17条の規定によるサービス停止期間中、お客様が本サービスを利用できなかったことに関する損害、作業が中断したことに関する損害、データが失われたことに関する損害、本サービスを利用することによって得られたであろう利益を得られなかった損害など、本サービスの利用に際して発生した損害については、直接損害・間接損害、現実に発生した損害か否かを問わず、当社は一切の責任を負わないものとし、お客様はこれを承諾するものとします。<br><br>

                    第18条の規定によって本サービスが廃止された場合、お客様が本サービスを利用できなくなったことに関する損害、作業が中断したことに関する損害、データが失われたことに関する損害、本サービスを利用することによって得られたであろう利益を得られなかった損害など、本サービスの利用に際して発生した損害については、直接損害・間接損害、現実に発生した損害か否かを問わず、当社は一切の責任を負わないものとし、お客様はこれを承諾するものとします。<br><br>

                    第27条（責任の制限）<br>
                    本利用規約における当社の各免責規定は、当社に故意又は重過失が存在する場合には適用しません。<br><br>

                    当社が損害賠償責任を負う場合（前項の場合又は法律の適用による場合等。）、賠償すべき損害の範囲は、お客様に現実に発生した直接かつ通常生じる範囲内の損害に限るものとし、逸失利益を含むその他の特別損害については責任を負いません。また、その賠償額は、当該損害発生時までに当該利用契約の契約者が当社に支払った利用料金を限度とします。<br><br>

                    第28条（紛争処理及び損害賠償）<br>
                    契約者は、契約者または閲覧者に付与した権限に基づく利用を行う者が本サービスの利用により当社又は第三者に対し損害を与え、紛争となった場合（お客様が本利用規約上の義務を履行しないことにより当社又は第三者が損害を被った場合を含む）は、自己の責任と費用をもって、当該紛争を処理すると共に、かかる損害を賠償するものとします。<br><br>

                    第29条（秘密保持）<br>
                    お客様は、本サービスに関連して当社がお客様に対して秘密に扱うことを指定して開示した情報について、当社の事前の書面による承諾がある場合を除き、開示目的以外に利用せず、また、第三者に開示しないものとします。<br><br>

                    第30条（分離可能性）<br>
                    本利用規約の規定の一部が法令又は裁判所により違法、無効又は不能であるとされた場合においても、本利用規約のその他の規定は有効に存続します。<br><br>

                    第31条（準拠法）<br>
                    本利用契約の成立、効力、履行及び解釈には、日本法が適用されるものとします。<br><br>

                    第32条（専属的合意管轄）<br>
                    本利用契約に関わる紛争については、大阪地方裁判所を第一審の専属的合意管轄裁判所とします。<br><br>

                    第33条（協議）<br>
                    本サービスに関してお客様と当社との間で問題が生じた場合、お客様と当社は誠意をもって協議し、その解決に努めるものとします。<br><br>

                    以上
                    </p>
                </div>

                <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                    <button type="button" class="inline-block px-6 py-2.5 bg-sky-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-sky-400 hover:shadow-lg focus:bg-sky-400 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-sky-400 active:shadow-lg transition duration-150 ease-in-out" data-bs-dismiss="modal">わかりました</button>
                </div>
            </div>
        </div>
    </div>

    <div class="py-20"></div>

    <!--content ends here-->

    <!--script-->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <!-- pdf.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.10.377/build/pdf.min.js"></script>
    <!-- SweetAlerts CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

    <script>
        tailwind.config = {
          theme: {
            extend: {
                colors: {
                    transparent: 'transparent',
                    current: 'currentColor',
                    'theme-white': '#f6f6e9',
                    'theme-black': '#2a221b',
                    'theme-yellow': '#ffc300',
                    'theme-cream': '#ffffcc',
                    'theme-blue': '#61a6ab',
                    'theme-pink': '#f7b9a1',
                    'theme-orange': '#ff9011',
                }
            }
          }
        }
    </script>

    <script>
        jQuery(window).on('scroll', function() {
            if(jQuery(window).scrollTop() > 0) {
                jQuery('#header-frame').css('opacity', '0.8');
            }
            else {
                jQuery('#header-frame').css('opacity', '1');
            }
        });

        jQuery(document).ready(function() {
            $('#member-tab').addClass('active');
        });

        $(document).scroll(function() {})

    </script>
    <!--script ends here-->
</body>
</html>
