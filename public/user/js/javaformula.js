
function getNewFederalTaxRate(payPeriodsPerYear, maritalStatus, exemptions, grossTotal) {
    var periods = parseInt(payPeriodsPerYear);
    var exemptionCount = parseInt(exemptions);
    var gross = parseFloat(grossTotal);

    // Default fallback tax values
    var result = {
        subtract: 0,
        rate: 0
    };

    if (periods) {
        var taxTable = getNewFederalTaxArray(periods);
        if (maritalStatus in taxTable) {
            var bracketList = taxTable[maritalStatus][exemptionCount];
            if (bracketList) {
                for (var threshold in bracketList) {
                    if (gross > parseFloat(threshold)) {
                        result = bracketList[threshold];
                    } else {
                        break;
                    }
                }
            }
        }
    }
    return result;
}

function getNewFederalTaxArray(periods) {
    if (periods == 52) return FTweekly;
    if (periods == 26) return FTbiweekly;
    if (periods == 12) return FTmonthly;
    if (periods == 6) return FTsemimonthly;
    return FTweekly; // Fallback
}

var FTweekly = {
    single: [
        { 0: { subtract: 285, rate: .1 }, 514: { subtract: 323, rate: .12 }, 1218: { subtract: 735, rate: .22 }, 2273: { subtract: 850, rate: .24 }, 4081: { subtract: 1820, rate: .32 }, 5104: { subtract: 2150, rate: .35 }, 12330: { subtract: 2750, rate: .37 } }
    ],
    married: [
        { 0: { subtract: 569, rate: .1 }, 1028: { subtract: 646, rate: .12 }, 2436: { subtract: 1470, rate: .22 }, 4546: { subtract: 1700, rate: .24 }, 8162: { subtract: 3640, rate: .32 }, 10208: { subtract: 4300, rate: .35 }, 24660: { subtract: 5500, rate: .37 } }
    ]
};

var FTbiweekly = {
    single: [
        { 0: { subtract: 569, rate: .1 }, 1028: { subtract: 646, rate: .12 }, 2436: { subtract: 1470, rate: .22 }, 4546: { subtract: 1700, rate: .24 }, 8162: { subtract: 3640, rate: .32 }, 10208: { subtract: 4300, rate: .35 }, 24660: { subtract: 5500, rate: .37 } }
    ],
    married: [
        { 0: { subtract: 1138, rate: .1 }, 2056: { subtract: 1292, rate: .12 }, 4872: { subtract: 2940, rate: .22 }, 9092: { subtract: 3400, rate: .24 }, 16324: { subtract: 7280, rate: .32 }, 20416: { subtract: 8600, rate: .35 }, 49320: { subtract: 11000, rate: .37 } }
    ]
};

var FTmonthly = {
    single: [
        { 0: { subtract: 1233, rate: .1 }, 2227: { subtract: 1400, rate: .12 }, 5278: { subtract: 3185, rate: .22 }, 9258: { subtract: 3683, rate: .24 }, 16600: { subtract: 7887, rate: .32 }, 20767: { subtract: 9317, rate: .35 }, 50222: { subtract: 11917, rate: .37 } },
        { 0: { subtract: 700, rate: .1 }, 1510: { subtract: 835, rate: .12 }, 3987: { subtract: 2268.33, rate: .22 }, 7946: { subtract: 2730.56, rate: .24 }, 14283: { subtract: 6240.63, rate: .32 }, 17896: { subtract: 7295.56, rate: .35 }, 44279: { subtract: 9263.56, rate: .37 } },
        { 0: { subtract: 1083, rate: .1 }, 1893: { subtract: 1218.33, rate: .12 }, 4370: { subtract: 2651.67, rate: .22 }, 8329: { subtract: 3113.89, rate: .24 }, 14666: { subtract: 6623.96, rate: .32 }, 18279: { subtract: 7678.89, rate: .35 }, 44662: { subtract: 9646.89, rate: .37 } },
        { 0: { subtract: 1466, rate: .1 }, 2276: { subtract: 1601.67, rate: .12 }, 4753: { subtract: 3035, rate: .22 }, 8712: { subtract: 3497.22, rate: .24 }, 15049: { subtract: 7007.29, rate: .32 }, 18662: { subtract: 8062.22, rate: .35 }, 45045: { subtract: 10030.22, rate: .37 } },
        { 0: { subtract: 1849, rate: .1 }, 2659: { subtract: 1985, rate: .12 }, 5136: { subtract: 3418.33, rate: .22 }, 9095: { subtract: 3880.56, rate: .24 }, 15432: { subtract: 7390.63, rate: .32 }, 19045: { subtract: 8445.56, rate: .35 }, 45428: { subtract: 10413.56, rate: .37 } },
        { 0: { subtract: 2232, rate: .1 }, 3042: { subtract: 2368.33, rate: .12 }, 5519: { subtract: 3801.67, rate: .22 }, 9478: { subtract: 4263.89, rate: .24 }, 15815: { subtract: 7773.96, rate: .32 }, 19428: { subtract: 8828.89, rate: .35 }, 45811: { subtract: 10796.89, rate: .37 } },
        { 0: { subtract: 2615, rate: .1 }, 3425: { subtract: 2751.67, rate: .12 }, 5902: { subtract: 4185, rate: .22 }, 9861: { subtract: 4647.22, rate: .24 }, 16198: { subtract: 8157.29, rate: .32 }, 19811: { subtract: 9212.22, rate: .35 }, 46194: { subtract: 11180.22, rate: .37 } },
        { 0: { subtract: 2998, rate: .1 }, 3808: { subtract: 3135, rate: .12 }, 6285: { subtract: 4568.33, rate: .22 }, 10244: { subtract: 5030.56, rate: .24 }, 16581: { subtract: 8540.63, rate: .32 }, 20194: { subtract: 9595.56, rate: .35 }, 46577: { subtract: 11563.56, rate: .37 } },
        { 0: { subtract: 3381, rate: .1 }, 4191: { subtract: 3518.33, rate: .12 }, 6668: { subtract: 4951.67, rate: .22 }, 10627: { subtract: 5413.89, rate: .24 }, 16964: { subtract: 8923.96, rate: .32 }, 20577: { subtract: 9978.89, rate: .35 }, 46960: { subtract: 11946.89, rate: .37 } },
        { 0: { subtract: 3764, rate: .1 }, 4574: { subtract: 3901.67, rate: .12 }, 7051: { subtract: 5335, rate: .22 }, 11010: { subtract: 5797.22, rate: .24 }, 17347: { subtract: 9307.29, rate: .32 }, 20960: { subtract: 10362.22, rate: .35 }, 47343: { subtract: 12330.22, rate: .37 } }
    ],
    married: [
        { 0: { subtract: 1075, rate: .1 }, 2696: { subtract: 1345.21, rate: .12 }, 7653: { subtract: 4405.81, rate: .22 }, 15563: { subtract: 5276.71, rate: .24 }, 28236: { subtract: 11038.38, rate: .32 }, 35467: { subtract: 13186.71, rate: .35 }, 52477: { subtract: 15231.81, rate: .37 } },
        { 0: { subtract: 1458, rate: .1 }, 3079: { subtract: 1728.54, rate: .12 }, 8036: { subtract: 4789.14, rate: .22 }, 15946: { subtract: 5660.04, rate: .24 }, 28619: { subtract: 11421.71, rate: .32 }, 35850: { subtract: 13570.04, rate: .35 }, 52860: { subtract: 15615.14, rate: .37 } },
        { 0: { subtract: 1841, rate: .1 }, 3462: { subtract: 2111.87, rate: .12 }, 8419: { subtract: 5172.48, rate: .22 }, 16329: { subtract: 6043.38, rate: .24 }, 29002: { subtract: 11805.05, rate: .32 }, 36233: { subtract: 13953.38, rate: .35 }, 53243: { subtract: 16000.48, rate: .37 } },
        { 0: { subtract: 2224, rate: .1 }, 3845: { subtract: 2495.21, rate: .12 }, 8802: { subtract: 5555.81, rate: .22 }, 16712: { subtract: 6426.71, rate: .24 }, 29385: { subtract: 12188.38, rate: .32 }, 36616: { subtract: 14336.71, rate: .35 }, 53626: { subtract: 16381.81, rate: .37 } },
        { 0: { subtract: 2607, rate: .1 }, 4228: { subtract: 2878.54, rate: .12 }, 9185: { subtract: 5939.14, rate: .22 }, 17095: { subtract: 6810.04, rate: .24 }, 29768: { subtract: 12571.71, rate: .32 }, 36999: { subtract: 14720.04, rate: .35 }, 54009: { subtract: 16765.14, rate: .37 } },
        { 0: { subtract: 2990, rate: .1 }, 4611: { subtract: 3261.87, rate: .12 }, 9568: { subtract: 6322.48, rate: .22 }, 17478: { subtract: 7193.38, rate: .24 }, 30151: { subtract: 12955.05, rate: .32 }, 37382: { subtract: 15103.38, rate: .35 }, 54392: { subtract: 17148.48, rate: .37 } },
        { 0: { subtract: 3373, rate: .1 }, 4994: { subtract: 3645.21, rate: .12 }, 9951: { subtract: 6705.81, rate: .22 }, 17861: { subtract: 7576.71, rate: .24 }, 30534: { subtract: 13338.38, rate: .32 }, 37765: { subtract: 15486.71, rate: .35 }, 54775: { subtract: 17531.81, rate: .37 } },
        { 0: { subtract: 3756, rate: .1 }, 5377: { subtract: 4028.54, rate: .12 }, 10334: { subtract: 7089.14, rate: .22 }, 18244: { subtract: 7960.04, rate: .24 }, 30917: { subtract: 13721.71, rate: .32 }, 38148: { subtract: 15870.04, rate: .35 }, 55158: { subtract: 17915.14, rate: .37 } },
        { 0: { subtract: 4139, rate: .1 }, 5760: { subtract: 4411.87, rate: .12 }, 10717: { subtract: 7472.48, rate: .22 }, 18627: { subtract: 8343.38, rate: .24 }, 31300: { subtract: 14105.05, rate: .32 }, 38531: { subtract: 16253.38, rate: .35 }, 55541: { subtract: 18298.48, rate: .37 } },
        { 0: { subtract: 4522, rate: .1 }, 6143: { subtract: 4795.21, rate: .12 }, 11100: { subtract: 7855.81, rate: .22 }, 19010: { subtract: 8726.71, rate: .24 }, 31683: { subtract: 14488.38, rate: .32 }, 38914: { subtract: 16636.71, rate: .35 }, 55924: { subtract: 18681.81, rate: .37 } }
    ]
};

var FTsemimonthly = {
    single: [
        { 0: { subtract: 616, rate: .1 }, 1113: { subtract: 699, rate: .12 }, 2640: { subtract: 1590, rate: .22 }, 4925: { subtract: 1840, rate: .24 }, 8842: { subtract: 3940, rate: .32 }, 11059: { subtract: 4660, rate: .35 }, 26725: { subtract: 5960, rate: .37 } }
    ],
    married: [
        { 0: { subtract: 1233, rate: .1 }, 2227: { subtract: 1400, rate: .12 }, 5278: { subtract: 3185, rate: .22 }, 9258: { subtract: 3683, rate: .24 }, 16600: { subtract: 7887, rate: .32 }, 20767: { subtract: 9317, rate: .35 }, 50222: { subtract: 13917, rate: .37 } }
    ]
};
