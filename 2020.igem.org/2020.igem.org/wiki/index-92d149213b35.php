//Coding Challenge #78
//Thanks Dan sensei! 



var bgg = (s) => {
    let s_particles = []; //s_particlesは配列
    let lines = [];
    let texts = [];
    var maxP = 12;

    s.setup = function() {
        var mycana = s.createCanvas(s.windowWidth, s.windowHeight);
        mycana.parent('body_warp');
    }


    s.draw = function() {
        s.clear()
        if (s_particles.length < maxP) {
            for (let i = 0; i < 1; i++) {
                let p = new sParticle();
                let l = new Line();
                let t = new Text();

                p.index = s_particles.length;
                s_particles.push(p); //オブジェクトを追加するpush関数

                l.index = lines.length;
                lines.push(l); //オブジェクトを追加するpush関数


                t.index = texts.length;
                texts.push(t); //オブジェクトを追加するpush関数
            }
        }



        for (let i = s_particles.length - 1; i >= 0; i--) {
            s_particles[i].update();
            s_particles[i].show();

            lines[i].update();
            lines[i].show();

            texts[i].update();
            texts[i].show();
        }





    }




    class sParticle { //particleの設定
        constructor() {


            this.x = s.width * s.random(0, 1);; //位置の設定
            this.y = s.height * s.random(0, 1); //位置の設定

            this.vx = s.random(-45, -2.0); //s_particles速度
            this.vy = 0; //s_particles速度
            this.fr = 0.2 + s.random(0.2, 0.5);
            this.alpha = s.random(50, 200);
            this.alpha_a = this.alpha;
            this.ww = s.random(35, 100);
            this.yy = this.ww;

            this.out = () => {

                if (this.alpha > 0) {
                    this.alpha -= 5;
                    this.alpha_a -= 5;
                    this.alpha_a = Math.floor(s.random() * 10) > 5 ? 40 : 150;
                    if (this.alpha <= 0) {
                        // console.log(0)
                        //console.log(this.index)
                        var that = this;
                        var ind = this.index;
                        s_particles[ind] = new sParticle();
                        s_particles[ind].index = ind;
                        s_particles[ind].update();
                        s_particles[ind].show();


                    }
                }


            }
        }

        update() {
            this.ww += this.fr;
            this.x -= this.fr / 2;
            this.y -= this.fr / 2;
            this.yy += this.fr;

            if (this.ww >= 200) {
                this.out();

            }
            //this.alpha -= 5;
            s.frameRate(20);
        }

        show() {
            s.stroke(225, 243, 215, this.alpha_a);
            s.strokeWeight(2);
            //fill(s.random(20, 25), 243, 345, this.alpha);
           s. noFill();
            s.rect(this.x, this.y, this.ww, this.yy);
        }
    }


    class Line { //particleの設定
        constructor() {


            this.x = s.width * s.random(0, 1);; //位置の設定
            this.y = s.height * s.random(0, 1); //位置の設定
            this.dir = Math.floor(s.random(1, 4.9));
            this.fr = 2 + s.random(2, 5);
            this.alpha = s.random(50, 120);
            this.alpha_a = this.alpha;
            this.x1 = this.x;
            this.y1 = this.y;
            this.v = s.random(1, 2);

            this.out = () => {

                if (this.alpha > 0) {
                    this.alpha -= 5;
                    this.alpha_a -= 5;
                    this.alpha_a = Math.floor(s.random() * 10) > 5 ? 40 : 150;
                    if (this.alpha <= 0) {
                        // console.log(0)
                        //console.log(this.index)
                        var that = this;
                        var ind = this.index;
                        lines[ind] = new Line();
                        lines[ind].index = ind;
                        lines[ind].update();
                        lines[ind].show();

                    }
                }


            }
        }

        update() {
            //up
            if (this.dir == 1) {

                this.y1 -= this.fr;

                this.y1 -= this.v;
                this.y -= this.v;

            }
            //down
            if (this.dir == 2) {

                this.y1 += this.fr;
                this.y1 += this.v;
                this.y += this.v;

            } //left
            if (this.dir == 3) {
                this.x1 -= this.fr;
                this.x1 -= this.v;
                this.x -= this.v;

            } //right
            if (this.dir == 4) {
                this.x1 += this.fr;
                this.x1 += this.v;
                this.x += this.v;


            }


            if (Math.abs(this.y1 - this.y) >= 200 || Math.abs(this.x1 - this.x) >= 200) {
                this.out();

            }
            //this.alpha -= 5;
            s.frameRate(20);
        }

        show() {
            s.stroke(230, 230, 230, this.alpha_a);
            s.strokeWeight(2);


            s.line(this.x, this.y, this.x1, this.y1)
        }
    }


    class Text { //particleの設定
        constructor() {


            this.x = s.width * s.random(0, 1);; //位置の設定
            this.y = s.height * s.random(0, 1); //位置の設定
            this.dir = Math.floor(s.random(1, 2.9));
            this.alpha = s.random(50, 200);
            this.alpha_a = this.alpha;
            this.text = "Jilin_China";
            this.fontsize = s.random(9, 15);
            this.v = s.random(1, 2);
            this.res = 0;
            this.out = () => {

                if (this.alpha > 0) {
                    this.alpha -= 5;
                    this.alpha_a -= 5;
                    this.alpha_a = Math.floor(s.random() * 10) > 5 ? 40 : 150;
                    if (this.alpha <= 0) {
                        // console.log(0)
                        //console.log(this.index)
                        var that = this;



                        var ind = this.index;
                        texts[ind] = new Text();
                        texts[ind].index = ind;
                        texts[ind].update();
                        texts[ind].show();







                    }
                }


            }
        }

        update() {
            //left


            if (this.dir == 1) {

                this.x -= this.v;

            }
            //right
            if (this.dir == 2) {

                this.x += this.v;

            } //left
            this.res += this.v;
            if (this.res >= 250) {
                this.out();

            }
            //this.alpha -= 5;
            s.frameRate(20);
        }

        show() {
            s.stroke(235, 243, 245, this.alpha_a);
            s.strokeWeight(1);
            s.textSize(this.fontsize);
            s.text(this.text, this.x, this.y);
        }
    }
}
new p5(bgg);