const nonStringError = 'Make sure that both arguments are strings'
const emptyStringError = 'Make sure that both arguments are non empty strings'

/**
 *
 * @param {string} word - A word in English
 * @param {string} pigLatinCandidate - A pig Latin word candidate
 * @returns {boolean} - Returns whether the given word is a pig Latin or not
 */
const pigLatin = (word, pigLatinCandidate) => {

    // Validating the given input.
    validateInput(word, pigLatinCandidate)

    // Transforming both strings to lower case.
    const wordLower = word.toLowerCase()
    const pigLatinCandidateLower = pigLatinCandidate.toLowerCase()

    // Creating regular expresion for vowels.
    const vowelsRegex = /[aeiou]/gi

    // Checking if the given word starts with a vowel. If so, add "way" to the end of it.
    if(wordLower.charAt(0).match(vowelsRegex)) return `${wordLower}way` === pigLatinCandidateLower

    // Getting the position of the first vowel and generating the pig Latin word.
    const firstVowelMatch = wordLower.match(vowelsRegex) || ['']
    const firstVowelIndex = wordLower.indexOf(firstVowelMatch[0])
    const pigLatin = `${wordLower.slice(firstVowelIndex)}${wordLower.slice(0, firstVowelIndex)}ay`

    return pigLatin === pigLatinCandidateLower
}

/**
 * 
 * @param {string} word - A word in English
 * @param {string} pigLatinCandidate - A pig Latin word candidate
 */
const validateInput = (word, pigLatinCandidate) => {
    // Checking if both inputs are string
    if(typeof word !== 'string' || typeof pigLatinCandidate !== 'string') throw new Error(nonStringError)
    // Checking if both strings are not empty
    if(word.length === 0 || pigLatinCandidate.length === 0) throw new Error(emptyStringError)
}

module.exports = {pigLatin, nonStringError, emptyStringError}
