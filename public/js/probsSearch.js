function indexOfMax(arr) {
  if (arr.length === 0) {
      return -1;
  }

  var max = arr[0];
  var maxIndex = 0;

  for (var i = 1; i < arr.length; i++) {
      if (arr[i] > max) {
          maxIndex = i;
          max = arr[i];
      }
  }

  return maxIndex;
}

function calcProbs(data, args){
  var probs = Array(data.length)
  probs.fill(1)

  args.forEach(element => {

    for(i = 0; i < probs.length; i++){
      var newProb = data[i][element]
      newProb = newProb == null ? 1 : newProb
      probs[i] = probs[i] * newProb
    }

  });

  return probs
}