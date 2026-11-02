"use strict";
let r = require("readline").createInterface({
    input: process.stdin,
    output: process.stdout
});
r.question("Enter student name: ", (name) => {
    r.question("Enter IP marks: ", (ip) => {
        r.question("Enter C++ marks: ", (cpp) => {
            r.question("Enter Maths marks: ", (maths) => {
                let total = Number(ip) + Number(cpp) + Number(maths);
                console.log("Name:", name);
                console.log("Total:", total);
                console.log("Average:", total / 3);
                r.close();
            });
        });
    });
});
