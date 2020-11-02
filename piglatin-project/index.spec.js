const { pigLatin, nonStringError, emptyStringError} = require('./index')

describe("test", () => {
    describe("Testing words starting with consonant sounds", () => {
      it("banana = ananabay", () => {
        expect(pigLatin('banana', 'ananabay')).toBe(true)
      })
      it("will = illway", () => {
        expect(pigLatin('will', 'illway')).toBe(true)
      })
      it("happy = appyhay", () => {
        expect(pigLatin('happy', 'appyhay')).toBe(true)
      })
      it("duck != uckd", () => {
        expect(pigLatin('duck', 'uckd')).toBe(false)
      })
      it("smile = ilesmay", () => {
        expect(pigLatin('smile', 'ilesmay')).toBe(true)
      })
      it("store = orestay", () => {
        expect(pigLatin('store', 'orestay')).toBe(true)
      })
      it("trash != ashtr", () => {
        expect(pigLatin('trash', 'ashtr')).toBe(false)
      })
      it("l = lay", () => {
        expect(pigLatin('l', 'lay')).toBe(true)
      })
    })
  })


  describe("test", () => {
    describe("Testing words starting with vowel sounds", () => {
      it("eat = eatway", () => {
        expect(pigLatin('eat', 'EATWAY')).toBe(true)
      })
      it("always = alwaysway", () => {
        expect(pigLatin('will', 'illway')).toBe(true)
      })
      it("omelet = omeletway", () => {
        expect(pigLatin('omelet', 'omeletway')).toBe(true)
      })
      it("ends != end", () => {
        expect(pigLatin('ends', 'end')).toBe(false)
      })
      it("e = eway", () => {
        expect(pigLatin('e', 'eway')).toBe(true)
      })
    })
  })

  describe("test", () => {
    describe("Testing bad input scenarios", () => {
      it("When both arguments are passed as empty strings", () => {
        expect(() => { pigLatin('', '')}).toThrow(emptyStringError)
      })
      it("When word is an empty string", () => {
        expect(() => { pigLatin('', 'piglatinword')}).toThrow(emptyStringError)
      })
      it("When pigLatinCandidate is an empty string", () => {
        expect(() => { pigLatin('word', '')}).toThrow(emptyStringError)
      })
      it("When both arguments are not strings", () => {
        expect(() => { pigLatin(5, 10)}).toThrow(nonStringError)
      })
      it("When word is not a string", () => {
        expect(() => { pigLatin(5, '')}).toThrow(nonStringError)
      })
      it("When pigLatinCandidate is not a string", () => {
        expect(() => { pigLatin('', 10)}).toThrow(nonStringError)
      })
      it("When at least one parameter is a sentence", () => {
        expect(pigLatin('hello world', 'worldway')).toBe(false)
      })
    })
  })