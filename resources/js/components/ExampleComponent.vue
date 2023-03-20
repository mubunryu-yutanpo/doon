<template>
<div>

    <!-- 出題中 -->
    <div class="c_content-card" v-if="!isEnd">
      <div class="">
          <!-- this.numで現在の問題（配列のインデックス）を指定 -->
          <h3 class="c_content-card-title bg-1">{{ problems[this.num - 1].subtitle }}</h3>
          <p class="c_content-card-text">{{ problems[this.num - 1].problem_statement }}</p>
      </div>

      <!-- memo choicesをv-forで回してランダムで表示 -->
      <div class="c_content-card-select" v-for="choice in choices">
        <li class="c_content-card-select-list" v-if="!answered">
          <button class="c_content-card-select-btn" @click="getResult(choice)">{{ choice }}</button>
        </li>
      </div>

      <!-- 回答後 -->
      <div class="c_content-card-answered" v-if="answered">
        <h3 class="c_content-card-answered-result">
          <i class="fa-solid fa-xmark" v-if="!correctFlg"></i>
          <i class="fa-regular fa-circle" v-if="correctFlg"></i>
          {{ result }}
        </h3>
        <p class="">正解： {{ choices.correct }}</p>
        <p class="c_content-card-answered-title">解説：</p>
        <p class="c_content-card-answered-comment">{{ problemsComment }}</p>
        <div class="u_ta-center">
          <button class="c_content-card-answered-btn" @click="showNextProblem">{{ nextText }}</button>
        </div>
      </div>
    </div>

    <!-- 全問終了 -->
    <div class="c_content-card-finished" v-if="isEnd">
      <div class="c_content-card-finished-result">
        <p class="u_ta-center">
          <span class="c_content-card-finished-result-text">{{ totalCorrectNum }}</span> 問 /
          <span class="">{{ totalProblemNum }}</span> 問中
        </p>
        <p class="">正解しました!</p>
      </div>

      <div class="c_content-card-finished-next">
        <a href="" class="c_content-card-finished-next-link">リプレイ</a>
        <a href="/index" class="c_content-card-finished-next-link">クイズ一覧へもどる</a>
      </div>
    </div>

</div>

</template>

<script>
    export default {
        props: ['problems'],
        data: function(){
            return{
                correctFlg : false,
                totalCorrectNum : 0, //正解数
                totalProblemNum : 0, //問題数
                nextText : '', //次の問題がある・ない時に動的に変える
                finishText: '結果を表示',
                result: '', //1問ごとの正解・不正解の結果表示用
                problemsComment: '',
                num: 1,
                answered: false, //1問ごとの解答終了フラグ
                isEnd: false, //ドリルの全問題を終了した際のフラグ
                choices: [],
            }
        },

        methods:{
            shuffleAnswer: function(array){
                for (let i = array.length - 1; i > 0; i--) {
                    let r = Math.floor(Math.random() * (i + 1))
                    let tmp = array[i]
                    array[i] = array[r]
                    array[r] = tmp
                }
                return array;
            },
            getChoices: function(){
              this.result = '';
              //これを呼び出すときに引数にindexとかにして、引数にthis.num - 1みたいなの入れる
                this.totalProblemNum++;
                this.choices = [];
                this.choices.push(
                  this.problems[this.num - 1].correct,
                  this.problems[this.num - 1].fake1,
                  this.problems[this.num - 1].fake2,
                  this.problems[this.num - 1].fake3,
                );
                this.choices = this.shuffleAnswer(this.choices);
            },

            getResult: function(choice){
                this.answered = true;
                this.problemsComment = '';
                //効果音の読み込み
                let okSound = new Audio('/sounds/true.mp3');
                let ngSound = new Audio('/sounds/false.mp3');

                
                //問題に解説があれば入れる
                if(this.problems[this.num - 1].comment){
                    this.problemsComment = this.problems[this.num - 1].comment;
                }else{
                    this.problemsComment = 'なし';
                }

                //正解・不正解を判定
                if(this.problems[this.num - 1].correct === choice){
                    this.totalCorrectNum += 1;
                    this.correctFlg = true;
                    this.result = '正解！';
                    this.soundPlay(okSound);
                }else{
                    this.correctFlg = false;
                    this.result = '不正解...';
                    this.soundPlay(ngSound);
                }

                //次の問題があるかどうかチェック
                if(!this.problems[this.num]){
                  this.nextText = this.finishText;
                }else{
                  this.nextText = '次の問題へ';
                }

            },

            showNextProblem: function(){
                //最終問題ならEND
                if(this.nextText === this.finishText){
                    this.answered = false;
                    this.isEnd = true;
                }else{
                    this.answered = false;
                    this.num++;
                    this.getChoices();
                }
            },

            soundPlay: function(sound){
                sound.currentTime = 0;
                sound.play();
            },


        },

        mounted() {
            this.getChoices();
        }
    }
</script>
