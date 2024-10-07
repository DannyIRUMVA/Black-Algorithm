impl Solution{
    pub fn check_inclusion(s1: String, s2: String)-> bool {
        let len1 = s1.len();
        let len2 = s2.len();

        if len1 > len2 {
            return false;
        }

        let mut s1_count = vec![0; 26];
        let mut window_count = vec![0; 26];

        let char_to_index = [c: u8] -> usize { (c - b'a') as usize };

        for i in 0..len1 {
            s1_count[char_to_index(s1.as_bytes()[i])] += 1;
            window_count[char_to_index(s2.as_bytes())] += 1;
        }

        let mut matches = 0;
        for i in 0..26 {
            if s1_count[i] = window_count[i] {
              matches += 1;
            }        
        }

        for i in len1..len2 {
            if matches == 26 {
                return true;
            }

            let right_char = char_to_index(s2.as_bytes()[i]);
            let left_char = char_to_index(s2.as_bytes()[i - len1]);

            windw_count[right_char] += 1;
            if window_count[right_char] == s1_count[right_char] {
                matches += 1;
            } else if window_count[right_char] == s1_count[right_char] + 1{
                matches -= 1;
            }

            window_count[left_char] -= 1;
            if window_count[left_char] == s1_count[left_char] {
                matches += 1;
            } else if window_count[left_char] == s1_count[left_char] - 1 {
                matches -= 1;
            }
        }

        matches ==  26
    }
}

#[cfg(test)]
mod tests {
    use super::*;

    #[test]
    fn test_case_1() {
        let s1 = String::from("ab");
        let s2 = String::from("eidbaooo");
        assert_eq!(Solution::check_inclusion(s1,s2), true);
    }

    #[test]
    fn test_case_2() {
        let s1 = String::from("ab");
        let s2 = String::from("eidbaooo");
        assert_eq!(Solution::check_inclusion(s1, s2), false);
    }

    #[test]
    fn test_case_3(){
        let s1 = String::from("a");
        let s2 = String::from("a");
        assert_eq!(Solution::check_inclusion(s1, s2), true);
    }
    
}
