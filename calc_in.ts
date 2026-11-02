declare var require: any;
declare var process: any;

class Calculator {
    a: number;
    b: number;

    constructor(a: number, b: number) {
        this.a = a;
        this.b = b;
    }

    display() {
        console.log("Sum:", this.a + this.b);
        console.log("Difference:", this.a - this.b);
        console.log("Product:", this.a * this.b);
        console.log("Division:", this.b != 0 ? this.a / this.b : "Cannot divide by zero");
    }
}

let input = require("readline").createInterface({
    input: process.stdin, output: process.stdout
});

input.question("Enter first number: ", (x: string) => {
    input.question("Enter second number: ", (y: string) => {
        let c = new Calculator(Number(x), Number(y));
        c.display();
        input.close();
    });
});