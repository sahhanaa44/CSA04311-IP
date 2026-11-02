declare var require: any;
declare var process: any;

let r = require("readline").createInterface({
    input: process.stdin,
    output: process.stdout
});

r.question("Enter student name: ", (name: string) => {
    r.question("Enter IP marks: ", (ip: string) => {
        r.question("Enter C++ marks: ", (cpp: string) => {
            r.question("Enter Maths marks: ", (maths: string) => {
                let total = Number(ip) + Number(cpp) + Number(maths);
                console.log("Name:", name);
                console.log("Total:", total);
                console.log("Average:", total / 3);
                r.close();
            });
        });
    });
});